<?php

namespace KoperasiIo\KoperasiApi\App;

use GuzzleHttp\Client as Http;

class User extends BaseClient
{

    /**
     * Get list user.
     *
     * @return object The user.
     */
    public function getUsers()
    {
        return $this->call('GET', 'v1/users');
    }

    /**
     * Get current API user.
     *
     * @return object The user.
     */
    public function getUser($userId)
    {
        return $this->call('GET', 'v1/users/' . $userId);
    }

    /**
     * Get list member.
     *
     * @return object The member.
     */
    public function getAllMembers(array $params = [])
    {
        return $this->call('GET', 'v1/members/all', $params);
    }

    /**
     * Get list member.
     *
     * @return object The member.
     */
    public function getMembers()
    {
        return $this->call('GET', 'v1/members');
    }

    /**
     * Get current API member.
     *
     * @return object The member.
     */
    public function getMember($memberId)
    {
        return $this->call('GET', 'v1/members/' . $memberId);
    }

}