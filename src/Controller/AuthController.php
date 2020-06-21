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

class AuthController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/api/register")
     */
    public function signIn(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $manager, ValidatorInterface $validator)
    {
        $user = new User();
        $data = json_decode($request->getContent());
        $user->setUsername($data->username);
        $user->setPassword($data->password);

        $errors = $validator->validate($user);

        if (count($errors) > 0) {
            return View::create($errors);
        }

        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                $data->password
            )
        );

        $manager->persist($user);
        $manager->flush();

        return View::create($user, Response::HTTP_CREATED);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     // encode the plain password
        //     $user->setPassword(
        //         $passwordEncoder->encodePassword(
        //             $user,
        //             $form->get('password')->getData()
        //         )
        //     );

        //     $entityManager = $this->getDoctrine()->getManager();
        //     $entityManager->persist($user);
        //     $entityManager->flush();

        //     // do anything else you need here, like send an email

        //     return View::create([
        //         'status' => 'ok'
        //     ]);
        // }

        // if ($form->getErrors()) {
        //     return View::create($form->getErrors());
        //     // return JsonResponse::create($);
        // }
    }
}
