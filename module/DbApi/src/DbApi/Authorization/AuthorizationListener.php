<?php
/**
 * AuthorizationListener.php
 * @author      Gabriel Somoza <gabriel@usestrategery.com>
 * @date        9/5/2014 12:16 AM
 * @copyright   Copyright (c) 2014
 */

namespace DbApi\Authorization;


use ZF\MvcAuth\Authorization\AclAuthorization;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use ZF\MvcAuth\MvcAuthEvent;

class AuthorizationListener {

    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        /** @var AclAuthorization $authorization */
        $authorization = $mvcAuthEvent->getAuthorizationService();
        $authenticaton = $mvcAuthEvent->getAuthenticationService();

        /**
         * Regardless of how our configuration is currently through via the Apigility UI,
         * we want to ensure that the default rule for the service we want to give access
         * to a particular identity has a DENY BY DEFAULT rule.
         *
         * Naturally, if you have many versions, or many methods, you would want to build
         * some kind of logic to build all the possible strings, and push these into the
         * ACL. If this gets too cumbersome, writing an assertion would be the next best
         * approach.
         */
        $authorization->deny(null, 'DbApi\V1\Rest\User\Controller::collection', 'GET');
        $authorization->deny(null, 'DbApi\V1\Rest\User\Controller::entity', 'GET');

        if($authenticaton->hasIdentity() && $authenticaton->getIdentity()->getAuthenticationIdentity()) {
            /** @var \ZF\MvcAuth\Identity\IdentityInterface $currentUser */
            $currentUser = $authenticaton->getIdentity()->getAuthenticationIdentity();

            /**
             * Now, add the name of the identity in question as a role to the ACL
             */
            $authorization->addRole($currentUser['user_id']);

            /**
             * Next, assign the particular privilege that this identity needs.
             */
            $authorization->allow($currentUser['user_id'], 'DbApi\V1\Rest\User\Controller::entity', 'GET');
        }

    }

} 
