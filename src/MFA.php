<?php

namespace Nicekiwi\AuthSignal;

use Authsignal;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

class MFA
{
    protected Authsignal $authsignal;

    protected ConfigRepository $config;

    public function __construct(Authsignal $authsignal, ConfigRepository $config)
    {
        $this->authsignal = $authsignal;

        $this->authsignal::setApiKey($config->get('services.auth_signal.api_key'));
        $this->authsignal::setApiHostname($config->get('services.auth_signal.api_hostname'));
    }

    public function getAuthsignal(): Authsignal
    {
        return $this->authsignal;
    }

    public function track(string $userId, string $action, Array $payload): array
    {
        return $this->authsignal::track($userId, $action, $payload);
    }

    public function validateChallenge(string $token, ?string $userId = null): array
    {
        return $this->authsignal::validateChallenge($token, $userId);
    }

    public function getAction(string $userId, string $action, string $idempotencyKey): array
    {
        return $this->authsignal::getAction($userId, $action, $idempotencyKey);
    }

    public function getUser(string $userId, string $redirectUrl = null): array
    {
        return $this->authsignal::getUser($userId, $redirectUrl);
    }

    public function enrollVerifiedAuthenticator(string $userId, Array $authenticator): array
    {
        return $this->authsignal::enrollVerifiedAuthenticator($userId, $authenticator);
    }
}
