<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * Login Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $roles_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\User $user
 */
class Login extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'roles_id' => true,
        'users_id' => true,
        'profile_img' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }

    public function ProfileUpload($id, $file, &$LoginsTable, &$Flash) {
        $upload = new \Delight\FileUpload\FileUpload();
        $default = WEBROOT.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'profiles'; 
        $upload->withTargetDirectory($default);
        $upload->from('pictures');
        try {
            $uploadedFile = $upload->save();
            $this->profile_img = $uploadedFile->getFilenameWithExtension();
            $LoginsTable->save($this);
        }
        catch (\Delight\FileUpload\Throwable\InputNotFoundException $e) {
            // input not found
            $Flash->error($e->getMessage());
            return false;
        }
        catch (\Delight\FileUpload\Throwable\InvalidFilenameException $e) {
            // invalid filename
            $Flash->error($e->getMessage());
            return false;
        }
        catch (\Delight\FileUpload\Throwable\InvalidExtensionException $e) {
            // invalid extension
            $Flash->error($e->getMessage());
            return false;
        }
        catch (\Delight\FileUpload\Throwable\FileTooLargeException $e) {
            // file too large
            $Flash->error($e->getMessage());
            return false;
        }
        catch (\Delight\FileUpload\Throwable\UploadCancelledException $e) {
            // upload cancelled
            $Flash->error($e->getMessage());
            return false;
        }

        return true;

        
    }
}
