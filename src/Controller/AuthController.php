<?php

namespace App\Controller;

use App\Entity\User;
use FOS\RestBundle\View\View;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AuthController
 * @package App\Controller
 * @Rest\Route("/api")
 */
class AuthController extends AbstractFOSRestController
{
    private $manager;
    private $validator;

    public function __construct(EntityManagerInterface $manager, ValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @Rest\Post("/register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return View
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $data = json_decode($request->getContent());
        $user->setUsername($data->username);
        $user->setPassword($data->password);

        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            return View::create($errors);
        }

        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                $data->password
            )
        );

        $this->manager->persist($user);
        $this->manager->flush();

        return View::create($user, Response::HTTP_CREATED);
    }

    public function getInfosClient()
    {

    }

}
