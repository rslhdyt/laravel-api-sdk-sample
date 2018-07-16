<?php

namespace KoperasiIo\KoperasiApi\Api;

use KoperasiIo\KoperasiApi\ResponseApi;

class User extends AbstractApi
{
    /**
     * Get list user.
     *
     * @return object The user.
     */
    public function getUsers()
    {
        return $this->get('v1/user/users');
    }

    /**
     * Get current API user.
     *
     * @return object The user.
     */
    public function getUser($userId)
    {
        return $this->get('v1/user/users/' . $userId);
    }

    /**
     * Get list member.
     *
     * @return object The member.
     */
    public function getAllMembers(array $params = [])
    {
        return $this->get('v1/user/members/all', $params);
    }

    /**
     * Get list member.
     *
     * @return object LengthAwarePaginator.
     */
    public function getMembers(array $params = [])
    {
        return $this->getPaginate('v1/user/members', $params);
    }

    /**
     * Get current API member.
     *
     * @return object The member.
     */
    public function getMember($memberId)
    {
        if (empty($memberId)) {
            throw new \Exception('Member id required', 1);
        }

        return $this->get('v1/user/members/' . $memberId);
    }
    
    /**
     * Update member based on member id.
     *
     * @param integer $memberId
     * @return object The member
     */
    public function updateMember($memberId)
    {
        if (empty($memberId)) {
            throw new \Exception('Member id required', 1);
        }

        return $this->put('v1/user/members/' . $memberId);
    }
}
