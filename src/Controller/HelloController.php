<?php

namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Unpack\Result;

class HelloController extends AbstractController
{
    /**
     * @Route("hello_world")
     */
    public function world()
    {
        return new Response(
            "<html><body><h1>Hello World</h1></body></html>"
        );
    }

    /**
     * @Route("mostar-mensagem")
     */
    public function mensagem()
    {
        return $this->render("hello/mensagem.html.twig", [
            'mensagem' => 'Passando uma Mensagem'
        ]);
    }

    /**
     * @Route("cadastrar-produto")
     */
    public function produto()
    {
        $em = $this->getDoctrine()->getManager();

        $produto = new Produto();
        $produto->setNome("Notebook")
        ->setPreco(2000.00);

        $em->persist($produto);
        $em->flush();

        return new Response(content:"O Produto". $produto->getId() ."foi criado!");
    }
}