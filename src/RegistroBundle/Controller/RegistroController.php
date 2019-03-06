<?php

namespace RegistroBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RegistroBundle\Entity\Registro;
use RegistroBundle\Form\RegistroType;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Registro controller.
 *
 * @Route("/registro")
 */
class RegistroController extends Controller
{
    /**
     * Lists all Registro entities.
     *
     * @Route("/", name="registro_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $registros = $em->getRepository('RegistroBundle:Registro')->findAll();

        return $this->render('registro/index.html.twig', array(
            'registros' => $registros,

        ));
    }

    /**
     * Inicio de registro.
     *
     * @Route("/start", name="registro_inicio")
     * @Method({"GET", "POST"})
     */
    public function startAction(Request $request)
    {

        $defaultData = array('message' => 'Type your message here');
        $formail = $this->createFormBuilder($defaultData)
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType',array('label'=>'Ingresa el correo con el que te registraste'))
            ->getForm();

        $formail->handleRequest($request);

        if ($formail->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $mail = $formail->getData('mail');
            $em = $this->getDoctrine()->getManager();
            $registro = $em->getRepository('RegistroBundle:Registro')->findOneByMail($mail);

            if (!$registro) {
                throw $this->createNotFoundException(
                    'Registro no encontrado'
                );
            }

            $id = $registro->getId();
            $editForm = $this->createForm('RegistroBundle\Form\RegistroType', $registro);

            //return $this->render('registro/edit.html.twig', array('id' => $id, 'mail'=>$mail,'edit_form' => $editForm->createView(),'registro'=> $registro));

            return $this->render('registro/start.html.twig', array(
                'registro' => $registro,
            ));
        }

        return $this->render('registro/start.html.twig', array(
            'form' => $formail->createView(),

        ));
    }


    public function limiteActividad($actividad,$horario,$turno)

    {

        switch ($actividad) {
            case 'actividad1':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad1m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad1v') ? true : false;
            case 'actividad2':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad2m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad2v') ? true : false;
            case 'actividad3':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad3m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad3v') ? true : false;
            case 'actividad4':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad4m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad4v') ? true : false;
            case 'actividad5':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad5m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad5v') ? true : false;
            case 'actividad6':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad6m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad6v') ? true : false;
            case 'actividad7':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad7m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad7v') ? true : false;
            case 'actividad8':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad8m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad8v') ? true : false;
            case 'actividad9':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad9m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad9v') ? true : false;
            case 'actividad10':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad10m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad10v') ? true : false;
            case 'actividad11':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad11m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad11v') ? true : false;
            case 'actividad12':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad12m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad12v') ? true : false;
            case 'actividad13':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad13m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad13v') ? true : false;
            case 'actividad14':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad14m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad14v') ? true : false;
            case 'actividad15':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad15m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad15v') ? true : false;
            case 'actividad16':
                if($turno == 'm' )
                    return $limite = $horario[$actividad] < $this->getParameter('actividad16m') ? true : false;
                else
                    return $limite = $horario[$actividad] < $this->getParameter('actividad16v') ? true : false;
        }
    }


    /**
     * Creates a new Registro entity.
     *
     * @Route("/new", name="registro_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $registro = new Registro();
        $form = $this->createForm('RegistroBundle\Form\RegistroType', $registro);

        $form->remove('actividadm');
        $form->remove('actividadv');
        $form->remove('comida');
        $form->remove('playera');
        $form->remove('sexo');
        $form->remove('activo');

        $form->add('actividadm',null,array('label'=>false));
        $form->add('actividadv',null,array('label'=>false));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($registro);
            $em->flush();

            // Obtiene correo y msg de la forma de contacto
            $mailer = $this->get('mailer');

            $message = \Swift_Message::newInstance()
                ->setSubject('Registro - '. $this->getParameter('evento'))
                ->setFrom('webmaster@matmor.unam.mx')
                ->setTo(array($registro->getMail()))
                ->setBcc(array('gerardo@matmor.unam.mx'))
                ->setBody($this->renderView('registro/mail.txt.twig', array('entity' => $registro)))
            ;
            $mailer->send($message);

            //return $this->redirectToRoute('registro_show', array('id' => $registro->getId()));

            return $this->render('registro/confirm.html.twig', array('id' => $registro->getId(),'entity'=>$registro));
            //return $this->render('registro/start.html.twig', array('id' => $registro->getId(),'entity'=>$registro));

        }

        return $this->render('registro/new.html.twig', array(
            'registro' => $registro,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Registro entity.
     *
     * @Route("/{id}", name="registro_show")
     * @Method("GET")
     */
    public function showAction(Registro $registro)
    {
        $deleteForm = $this->createDeleteForm($registro);

        return $this->render('registro/show.html.twig', array(
            'registro' => $registro,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Registro entity.
     *
     * @Route("/{id}/edit/{mail}", name="registro_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Registro $registro, $mail)
    {
        $em = $this->getDoctrine()->getManager();
        $registro = $em->getRepository('RegistroBundle:Registro')->findOneByMail($mail);

        $totalm = $em->getRepository('RegistroBundle:Registro')->countActividad('actividadm');
        $totalv = $em->getRepository('RegistroBundle:Registro')->countActividad('actividadv');

        //var_dump($totalm);

        //$deleteForm = $this->createDeleteForm($registro);
        $editForm = $this->createForm('RegistroBundle\Form\RegEditType', $registro);
        $editForm->remove('nombre');
        $editForm->remove('paterno');
        $editForm->remove('materno');
        $editForm->remove('mail');
        $editForm->remove('institucion');
        $editForm->remove('carrera');

        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {
            $editForm->remove('activo');
        }

        $editForm->handleRequest($request);

     //var_dump($editForm->get('actividadm')->getData());
        //var_dump($actividad= array_search(true, $editForm->get('actividadv')->getData()));
        //var_dump($totalm);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            //var_dump($editForm->get('actividadm')->getData());
            $actividadm= array_search(true, $editForm->get('actividadm')->getData());
            $actividadv= array_search(true, $editForm->get('actividadv')->getData());



//            if( ($this->limiteActividad($actividadm,$totalm) == true && $this->limiteActividad($actividadv,$totalv) == true ) ||
//                ($actividadm == null || $actividadv == null) ){
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($registro);
//                $em->flush();
//
//            }

            if ( ($actividadm != null) && ($this->limiteActividad($actividadm, $totalm,'m') == false)) {

                //var_dump($actividadm);
                $this->get('session')->getFlashBag()->set('error', 'Verifica el número de lugares disponibles en tus actividades');
                return $this->redirectToRoute('registro_edit', array(
                        'mail' => $mail,
                        'id' => $registro->getId(),
                    )
                );
            }

            elseif ( ($actividadv != null) && ($this->limiteActividad($actividadv, $totalv,'v') == false)) {

                $this->get('session')->getFlashBag()->set('error', 'Verifica el número de lugares disponibles en tu actividad seleccionada del turno vespertino');
                return $this->redirectToRoute('registro_edit', array(
                        'mail' => $mail,
                        'id' => $registro->getId(),
                    )
                );
            }
//
            else {
                $em = $this->getDoctrine()->getManager();
                $em->persist($registro);
                $em->flush();

            }



            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                //$editForm->add('activo');
                return $this->redirectToRoute('admin');
            }

            // Obtiene correo y msg de la forma de contacto
            $mailer = $this->get('mailer');

            $message = \Swift_Message::newInstance()
                ->setSubject('Actividades - '. $this->getParameter('evento'))
                ->setFrom('webmaster@matmor.unam.mx')
                ->setTo(array($registro->getMail()))
                ->setBcc(array('gerardo@matmor.unam.mx'))
                ->setBody($this->renderView('registro/mail-actividades.txt.twig', array('entity' => $registro)))
            ;
            $mailer->send($message);

            $this->addFlash(
                'notice',
                'Tu registro ha sido modificado'
            );

            return $this->redirectToRoute('registro_edit', array('mail'=> $mail,'id' => $registro->getId()));
        }

        return $this->render('registro/edit.html.twig', array(
            'registro' => $registro,
            'edit_form' => $editForm->createView(),
            'totalm'=>$totalm,
            'totalv'=>$totalv,
            // 'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Registro entity.
     *
     * @Route("/{id}", name="registro_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Registro $registro)
    {
        $form = $this->createDeleteForm($registro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($registro);
            $em->flush();
        }

        return $this->redirectToRoute('registro_index');
    }

    /**
     * Creates a form to delete a Registro entity.
     *
     * @param Registro $registro The Registro entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Registro $registro)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('registro_delete', array('id' => $registro->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}