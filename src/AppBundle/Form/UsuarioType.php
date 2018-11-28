<?php
namespace AppBundle\Form;

use AppBundle\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class,array('label'=>'Nombre:','required'=>true,'attr'=>array('class'=>'form-control')))
            ->add('apellido', TextType::class,array('label'=>'Apellido:','required'=>true,'attr'=>array('class'=>'form-control')))
            ->add('username', TextType::class,array('label'=>'Usuario:','required'=>true,'attr'=>array('class'=>'form-control')))
            ->add('password',PasswordType::class, array('label'=>'Clave:','required'=>true,'attr'=>array('class'=>'form-control')))
            ->add('email', EmailType::class,array('label'=>'Email:','required'=>true,'attr'=>array('class'=>'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario',
            'csrf_protection'=>false,
            'cascade_validation'=>true,
            'allow_extra_fields'=>true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuario';
    }
}