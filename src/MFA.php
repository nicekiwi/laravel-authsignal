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

    public function track(...$args): array
    {
        return $this->authsignal::track(...$args);
    }

    public function validateChallenge(...$args): array
    {
        return $this->authsignal::validateChallenge(...$args);
    }

    public function getAction(...$args): array
    {
        return $this->authsignal::getAction(...$args);
    }

    public function getUser(...$args): array
    {
        return $this->authsignal::getUser(...$args);
    }

    public function enrollVerifiedAuthenticator(...$args): array
    {
        return $this->authsignal::enrollVerifiedAuthenticator(...$args);
    }
}
