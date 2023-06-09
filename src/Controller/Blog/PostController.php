<?php

namespace App\Controller\Blog;

use App\Repository\Post\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'post.index', methods: ['GET'])]
    public function post(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findPublished();

        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
