<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user, 3);  //p_id = 3 Post_edit
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user, 4);  //p_id = 4 Post_update
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user, 5);  //p_id = 5 Post_Delete

    }

    public function tag(admin $user)
    {
        return $this->getPermission($user, 10);  //p_id = 10 tag-CRUD

    }

    public function category(admin $user)
    {
        return $this->getPermission($user, 11);  //p_id = 11 category_CRUD

    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Model\frontend\admin  $user
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }

    /**
     * @param admin $user
     * @return bool
     */
    protected function getPermission(admin $user, $p_id): bool
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
