<?php

namespace App\Controller;

use App\Entity\Produto;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    /**
     * @Route("formulario")
     */
    public function formulario(Request $request)
    {
        $produto = new Produto();

        $form = $this->createFormBuilder($produto)
            ->add('nome', TextType::class)
            ->add('preco', MoneyType::class)
            ->add('enviar', SubmitType::class, ['label' => "Salvar"])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            return new Response(content:"Formulário Completo");
        }

        return $this->render("hello/formulario.html.twig", [
            'form' => $form->createView()
        ]);

    }
}