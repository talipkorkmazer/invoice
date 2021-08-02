<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class InvoiceController.
 *
 * @Route("/invoice")
 */
class InvoiceController extends AbstractController
{
    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * @Route("", name="invoice.index", methods={"GET"})
     */
    public function index(): Response
    {
        $invoices = $this->invoiceRepository->findAll();

        return $this->render(
            'invoice/index.html.twig',
            [
                'invoices' => $invoices,
            ]
        );
    }

    /**
     * @Route("/create", name="invoice.create")
     */
    public function create(Request $request): Response
    {
        $invoice = new Invoice();
        $invoice->setCurrency('EUR');
        $form = $this->createForm(
            InvoiceType::class,
            $invoice,
            [
                'action' => $this->generateUrl('invoice.create'),
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();
        }

        return $this->render(
            'invoice/create.html.twig',
            [
                'invoice_create_form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="invoice.edit")
     */
    public function edit(Request $request, $id): Response
    {
        $invoice = $this->invoiceRepository->find($id);
        $form = $this->createForm(
            InvoiceType::class,
            $invoice,
            [
                'action' => $this->generateUrl('invoice.edit', ['id' => $id]),
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();
        }

        return $this->render(
            'invoice/create.html.twig',
            [
                'invoice_create_form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/delete/{id}", name="invoice.delete")
     */
    public function delete($id): Response
    {
        $invoice = $this->invoiceRepository->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($invoice);
        $em->flush();

        return $this->redirectToRoute('invoice.index');
    }

    /**
     * @Route("/show/{id}", name="invoice.show")
     */
    public function show($id): Response
    {
        $invoice = $this->invoiceRepository->find($id);

        return $this->render(
            'invoice/show.html.twig',
            [
                'invoice' => $invoice
            ]
        );
    }



}
