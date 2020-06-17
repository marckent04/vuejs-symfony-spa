<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AuthController extends AbstractController
{
    /**
     * @Route("/signin", name="sign_in", methods={"POST"})
     */
    public function signIn(Request $request, UserPasswordEncoderInterface $passwordEncoder, SerializerInterface $serializer)
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain passwor d
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return JsonResponse::create([
                'status' => 'ok'
            ]);
        }

        if ($form->getErrors()) {
            return JsonResponse::create($serializer->serialize($form->getErrors(), 'json'));
            // return JsonResponse::create($);
        }
    }
}
