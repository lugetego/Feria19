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
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType',array('label'=>'Ingresa tu correo'))
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


    public function limiteActividad($actividad,$horario)

    {
        switch ($actividad) {
            case 'braille':
                return $limite = $horario[$actividad] <= 5 ? true : false;
            case 'burbujas':
                return $limite= $horario[$actividad] <= 6 ? true : false;
            case 'canguro':
                return $limite= $horario[$actividad] <= 5 ? true : false;
            case 'club':
                return $limite= $horario[$actividad] <= 5 ? true : false;
            case 'dimensiones':
                return $limite = $horario[$actividad] <= 4 ? true : false;
            case 'divulgamat':
                return $limite= $horario[$actividad] <= 4 ? true : false;
            case 'expo':
                return $limite=$horario[$actividad] <= 4 ? true : false;
            case 'gato':
                return $limite=$horario[$actividad] <= 4 ? true : false;
            case 'ciga':
                return $limite=$horario[$actividad] <= 4 ? true : false;
            case 'teatromatico':
                return $limite=$horario[$actividad] <= 2 ? true : false;
            case 'penrose':
                return $limite=$horario[$actividad] <= 6 ? true : false;
            case 'museo':
                return $limite=$horario[$actividad] <= 4 ? true : false;
            case 'irya':
                return $limite=$horario[$actividad] <= 6 ? true : false;
            case 'rompecabezas':
                return $limite=$horario[$actividad] <= 4 ? true : false;
            case 'topologia':
                return $limite=$horario[$actividad] <= 6 ? true : false;
                break;
            case 'papiroacertijos':
                return $limite=$horario[$actividad] <= 4 ? true : false;
                break;
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
                ->setSubject('Registro Feria Matemática 2018')
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
        //$actividad= array_search(true, $editForm->get('actividadm')->getData());

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // var_dump($editForm->get('actividadm')->getData());
            $actividadm= array_search(true, $editForm->get('actividadm')->getData());
            $actividadv= array_search(true, $editForm->get('actividadv')->getData());

            if( ($this->limiteActividad($actividadm,$totalm) == true && $this->limiteActividad($actividadv,$totalv) == true ) ||
                ($actividadm == null || $actividadv == null) ){
                $em = $this->getDoctrine()->getManager();
                $em->persist($registro);
                $em->flush();

            }
            else {

                $this->get('session')->getFlashBag()->set('error', 'Verifica el número de lugares disponibles en tus actividades');
                return $this->redirectToRoute('registro_edit', array(
                        'mail'=> $mail,
                        'id' => $registro->getId(),
                    )
                );
            }

            if ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                //$editForm->add('activo');
                return $this->redirectToRoute('admin');
            }

            // Obtiene correo y msg de la forma de contacto
            $mailer = $this->get('mailer');

            $message = \Swift_Message::newInstance()
                ->setSubject('Actividades Feria Matemática 2018')
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