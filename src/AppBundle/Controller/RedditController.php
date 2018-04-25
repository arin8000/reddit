<?php

namespace AppBundle\Controller;


use AppBundle\Entity\RedditPost;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedditController extends Controller
{
    /**
     * @Route("/", name="list")
     */
    public function listAction()
    {
        $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();

        dump($posts);

        return $this->render('index.html.twig', [
            'posts'  => $posts
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction()
    {
        $em = $this->getDoctrine()->getManager();

        $post = new RedditPost();
        $post->setTitle('Hello World!');

        $em->persist($post);
        $em->flush();



        return $this->redirectToRoute('list');
    }
}