<?php

namespace wodrow\yii2wadmin\models\tables;

use Yii;

/**
 * This is the model class for table "{{%admin_role_admin_action}}".
 *
 * @property int $id
 * @property string $admin_role_id
 * @property string $admin_action_id
 *
 * @property AdminAction $adminAction
 * @property AdminRole $adminRole
 */
class AdminRoleAdminAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_role_admin_action}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_role_id', 'admin_action_id'], 'required'],
            [['admin_role_id', 'admin_action_id'], 'integer'],
            [['admin_action_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminAction::className(), 'targetAttribute' => ['admin_action_id' => 'id']],
            [['admin_role_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminRole::className(), 'targetAttribute' => ['admin_role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'admin_role_id' => Yii::t('app', 'Admin Role ID'),
            'admin_action_id' => Yii::t('app', 'Admin Action ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminAction()
    {
        return $this->hasOne(AdminAction::className(), ['id' => 'admin_action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminRole()
    {
        return $this->hasOne(AdminRole::className(), ['id' => 'admin_role_id']);
    }
}
