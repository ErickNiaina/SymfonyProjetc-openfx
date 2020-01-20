<?php

namespace App\Form;

use App\Entity\UserOrigin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserOriginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entity')
            ->add('refExt')
            ->add('refInt')
            ->add('employee')
            ->add('fkEstablishment')
            ->add('datec')
            ->add('tms')
            ->add('fkUserCreat')
            ->add('fkUserModif')
            ->add('login')
            ->add('pass', PasswordType::class)
            ->add('passCrypted', PasswordType::class)
            ->add('passTemp')
            ->add('apiKey')
            ->add('gender')
            ->add('civility')
            ->add('lastname')
            ->add('firstname')
            ->add('address')
            ->add('zip')
            ->add('town')
            ->add('fkState')
            ->add('fkCountry')
            ->add('job')
            ->add('skype')
            ->add('officePhone')
            ->add('officeFax')
            ->add('userMobile')
            ->add('email')
            ->add('signature')
            ->add('admin')
            ->add('moduleComm')
            ->add('moduleCompta')
            ->add('fkSoc')
            ->add('fkSocpeople')
            ->add('fkMember')
            ->add('fkUser')
            ->add('notePublic')
            ->add('note')
            ->add('datelastlogin')
            ->add('datepreviouslogin')
            ->add('egroupwareId')
            ->add('ldapSid')
            ->add('openid')
            ->add('statut')
            ->add('photo')
            ->add('lang')
            ->add('color')
            ->add('barcode')
            ->add('fkBarcodeType')
            ->add('accountancyCode')
            ->add('nbHoliday')
            ->add('thm')
            ->add('tjm')
            ->add('salary')
            ->add('salaryextra')
            ->add('weeklyhours')
            ->add('openflexExtendData')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserOrigin::class,
        ]);
    }
}
