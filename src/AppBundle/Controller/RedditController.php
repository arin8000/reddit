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
     * @Route("/create/{text}", name="create")
     */
    public function createAction($text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new RedditPost();
        $post->setTitle('Hello ' . $text);

        $em->persist($post);
        $em->flush();



        return $this->redirectToRoute('list');
    }

    /**
     * @Route("/update/{id}/{text}" , name="update")
     */
    public function updateAction($id, $text)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:RedditPost')->find($id);

        if(!$post) {
            return $this->redirectToRoute('list');
        }

        /**
         * @var $post RedditPost
         */

        $post->setTitle($text);

        $em->flush();

        return $this->redirectToRoute('list');
    }

    /**
     * @Route("/delete/{id}" , name="delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:RedditPost')->find($id);

        if(!$post){
            return $this->redirectToRoute('list');
        }
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('list');
        
    }
}