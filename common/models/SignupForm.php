<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const SCENARIO_UPDATE = 'update';

    public $username;
    public $email;
    public $password;
    public $phone;

    /**
     * @var User
     */
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'except' => self::SCENARIO_UPDATE],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'except' => self::SCENARIO_UPDATE],
            ['password', 'string', 'min' => 4],

            ['phone', 'trim'],
            ['phone', 'required', 'except' => self::SCENARIO_UPDATE],
            [
                'phone',
                'match',
                'pattern' => '/^\+[0-9]{1,2}\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/',
                'message' => 'Phone number format +Х (ХХХ) ХХХ-ХХ-ХХ'
            ]
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $is_signup = $user->save() && $this->sendEmail($user);
        if($is_signup) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('user');
            $auth->assign($role, $user->getId());
        }
        return $is_signup;
    }

    /**
     * Updates profile of user.
     *
     * @return bool|null whether the updating account was successful.
     */
    public function update()
    {
        if (!$this->validate()) {
            return null;
        }

        if(!$this->_user)
            $this->initModel(Yii::$app->user->id);
        $user = $this->_user;
        $user->username = $this->username;
        $user->phone = $this->phone;
        $user->setPassword($this->password);

        return $user->save();

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    /**
     * Finds the User model based on its primary key value.
     * And fills this model attributes.
     * @param string $id
     */
    public function initModel($id)
    {
        if(!$this->_user)
            $this->_user = User::findOne($id);

        if($this->_user) {
            $this->username = $this->_user->username;
            $this->phone = $this->_user->phone;
        }
    }
}
