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
        $response = $this->get('v1/user/members');

        return ResponseApi::paginate($response);
    }

    /**
     * Get current API member.
     *
     * @return object The member.
     */
    public function getMember($memberId)
    {
        return $this->get('v1/user/members/' . $memberId);
    }
}
