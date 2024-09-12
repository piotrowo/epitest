<?php
/**
 * Book controller.
 */

namespace App\Controller;

use App\Entity\Book;
use App\Form\Type\BookType;
use App\Service\BookServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class BookController.
 */
#[Route('/Book')]
class BookController extends AbstractController
{
    /**
     * Constructor.
     *
     * @param BookServiceInterface $BookService Book service
     * @param TranslatorInterface  $translator  Translator
     */
    public function __construct(private readonly BookServiceInterface $BookService, private readonly TranslatorInterface $translator)
    {
    }

    /**
     * Index action.
     *
     * @param int $page Page number
     *
     * @return Response HTTP response
     */
    #[Route(name: 'Book_index', methods: 'GET')]
    public function index(#[MapQueryParameter] int $page = 1)): Response
    {
        $pagination = $this->BookService->getPaginatedList($page);

        return $this->render('Book/index.html.twig', ['pagination' => $pagination]);
    }

/**
 * Show action.
 *
 * @param Book $Book Book entity
 *
 * @return Response HTTP response
 */
#[Route('/{id}', name: 'Book_show', requirements: ['id' => '[1-9]\d*'], methods: 'GET')]
public function show(Book $Book): Response
{
    return $this->render('Book/show.html.twig', ['Book' => $Book]);
}

/**
 * Create action.
 *
 * @param Request $request HTTP request
 *
 * @return Response HTTP response
 */
#[Route('/create', name: 'Book_create', methods: 'GET|POST', )]
public function create(Request $request): Response
{
    $Book = new Book();
    $form = $this->createForm(
        BookType::class, 
        $Book, 
        ['action' => $this->generateUrl('Book_create')]
    );
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->BookService->save($Book);

        $this->addFlash(
            'success',
            $this->translator->trans('message.created_successfully')
        );

        return $this->redirectToRoute('Book_index');
    }

    return $this->render('Book/create.html.twig',  ['form' => $form->createView()]);
}

/**
 * Edit action.
 *
 * @param Request $request HTTP request
 * @param Book    $Book    Book entity
 *
 * @return Response HTTP response
 */
#[Route('/{id}/edit', name: 'Book_edit', requirements: ['id' => '[1-9]\d*'], methods: 'GET|PUT')]
public function edit(Request $request, Book $Book): Response
{
    $form = $this->createForm(
        BookType::class, 
        $Book, 
        [
            'method' => 'PUT',
            'action' => $this->generateUrl('Book_edit', ['id' => $Book->getId()]),
        ]
    );
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->BookService->save($Book);

        $this->addFlash(
            'success',
            $this->translator->trans('message.edited_successfully')
        );

        return $this->redirectToRoute('Book_index');
    }

    return $this->render(
        'Book/edit.html.twig', 
        [
            'form' => $form->createView(),
            'Book' => $Book,
        ]
    );
}

/**
 * Delete action.
 *
 * @param Request $request HTTP request
 * @param Book    $Book    Book entity
 *
 * @return Response HTTP response
 */
#[Route('/{id}/delete', name: 'Book_delete', requirements: ['id' => '[1-9]\d*'], methods: 'GET|DELETE')]
public function delete(Request $request, Book $Book): Response
{
    $form = $this->createForm(
        FormType::class, 
        $Book, 
        [
            'method' => 'DELETE',
            'action' => $this->generateUrl('Book_delete', ['id' => $Book->getId()]),
        ]
    );
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->BookService->delete($Book);

        $this->addFlash(
            'success',
            $this->translator->trans('message.deleted_successfully')
        );

        return $this->redirectToRoute('Book_index');
    }

    return $this->render(
        'Book/delete.html.twig', 
        [
            'form' => $form->createView(),
            'Book' => $Book,
        ]
    );
}
}
