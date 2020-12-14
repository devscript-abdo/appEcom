<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 11/décembre/2020
 **/

namespace App\Hooks\Validator\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\Exceptions\WebhookFailed;

class ValidatorHookRepository implements SignatureValidator, ValidatorHookInterface
{


    protected $state;

    public function setState($state)
    {
        $this->state = $state;
    }

    public function isValid(Request $request,  WebhookConfig $config): bool
    {

        if ($this->state) {
          //  logger($request->header());
            return true;
        } else {
          //  logger('Ouii  is here in False');
          //  logger($request);
            $signature = $request->header($config->signatureHeaderName);

            if (!$signature) {
                return false;
            }

            $signingSecret = $config->signingSecret;

            if (empty($signingSecret)) {
                throw WebhookFailed::signingSecretNotSet();
            }

            $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);

            return hash_equals($signature, $computedSignature);
        }
    }
}
