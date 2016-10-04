<?php
/**
 * Created by PhpStorm.
 * User: deepak
 * Date: 4/27/16
 * Time: 1:09 PM
 */
namespace ContactBookBundle\Form;

use ContactBookBundle\Model\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ContactBookBundle\Form\AddressFormType;
use Symfony\Component\Validator\Constraints\Choice;

class ContactFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
            'translation_domain' => 'contact',
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name', 'text', array(
            'label' => 'contact.firstName',
        ));

        $builder->add('last_name', 'text', array(
            'label' => 'contact.lastName',
        ));
        $builder->add('gender', 'choice', array(
            'choices' => array(
                '1' => 'male',
                '0' => 'female',
                '2' => 'other'
        ),
                'multiple' => false,
                'required' => true,
                'expanded' => true
        ));

        $builder->add('facebook_id', 'text', array(
            'label' => 'contact.facebookId',
            'required'    => false,
            'empty_data' => null

        ));

        $builder->add('friend_since', 'date', array(
            'data' => new \DateTime('now'),
            'format' => 'y-M-d',

        ));

        $builder->add('email', 'email', array(
            'label' => 'contact.email',
            'required' => false,
            'empty_data' => null

        ));
        $builder->add('Addresses', 'collection', array(
           'type' => new AddressFormType(),

       ));
        $builder->add('phones', 'collection', array(
           'type' => new PhoneFormType(),

       ));
        $builder->add('save', 'submit', array(

          'label' => 'contact.save',
       ));
    }
}
