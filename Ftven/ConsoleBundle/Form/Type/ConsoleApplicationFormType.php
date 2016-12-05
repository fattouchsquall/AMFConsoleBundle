<?php

/*
 * This file is part of the FtvenConsoleBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\ConsoleBundle\Form\Type;

use Ftven\ConsoleBundle\Form\Model\ConsoleApplication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Description of CommandFormType
 *
 * @author Amine Fattouch <amine.fattouch@francetv.fr>
 */
class ConsoleApplicationFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('commands', CollectionType::class, [
            'entry_type'   => CommandFormType::class,
            'required'     => true,
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => ConsoleApplication::class,
            'csrf_protection' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return '';
    }
}
