<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $fio;
    public $email;
    public $type;
    public $inn;
    public $organisation;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['fio', 'trim'],
            ['fio', 'required'],
            ['fio', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['type', 'boolean'],

            ['organisation', 'trim'],
            ['organisation', 'string', 'min' => 2, 'max' => 255],
            ['organisation', 'required',
                'when' => function($model) {
                    return $model->type;
                },
                'enableClientValidation' => false,
            ],

            ['inn', 'integer'],
            ['inn', 'required',
                'when' => function($model) {
                    return $model->type;
                },
                'enableClientValidation' => false,
            ],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $user->username = $this->email;
        $user->fio = $this->fio;
        $user->email = $this->email;
        $user->type = $this->type;
        $user->inn = $this->inn;
        $user->organisation = $this->organisation;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

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
}
