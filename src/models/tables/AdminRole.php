<?php

namespace wodrow\yii2wadmin\models\tables;

use Yii;

/**
 * This is the model class for table "{{%admin_role}}".
 *
 * @property string $id
 * @property string $name
 *
 * @property AdminRoleAdminAction[] $adminRoleAdminActions
 * @property AdminRoleUser[] $adminRoleUsers
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_role}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminRoleAdminActions()
    {
        return $this->hasMany(AdminRoleAdminAction::className(), ['admin_role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminRoleUsers()
    {
        return $this->hasMany(AdminRoleUser::className(), ['admin_role_id' => 'id']);
    }
}
