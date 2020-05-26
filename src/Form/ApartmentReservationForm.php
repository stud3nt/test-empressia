<?php

namespace App\Form;

use App\Entity\ApartmentReservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotNull;

class ApartmentReservationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reservationStart', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'input_format' => 'string',
                'format' => 'yyyy-MM-dd',
                'label' => 'Data rozpoczęcia wynajmu',
                'constraints' => [
                    (new NotNull([
                        'message' => 'Proszę podać datę rozpoczęcia wynajmu'
                    ])),
                    (new GreaterThan([
                        'value' => 'yesterday',
                        'message' => 'Nie można wybierać daty rozpoczęcia wynajmu wcześniejszej, niż dzisiejsza'
                    ])),
                ],
                'attr' => [
                    'class' => 'form-control',
                    'min' => (new \DateTime())->format('Y-m-d')
                ]
            ])
            ->add('reservationEnd', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'input_format' => 'string',
                'format' => 'yyyy-MM-dd',
                'label' => 'Data zakończenia wynajmu',
                'constraints' => [
                    (new NotNull([
                        'message' => 'Proszę podać datę zakończenia wynajmu'
                    ])),
                    (new GreaterThan([
                        'value' => 'yesterday',
                        'message' => 'Nie można wybrać daty zakończenia wynajmu wcześniejszej, niż dzisiejsza'
                    ])),
                    (new GreaterThanOrEqual([
                        'propertyPath' => 'parent.all[reservationStart].data',
                        'message' => 'Nie można podać daty zakończenia wynajmu wcześniejszej, niż data rozpoczęcia wynajmu'
                    ]))
                ],
                'attr' => [
                    'class' => 'form-control',
                    'min' => (new \DateTime())->format('Y-m-d')
                ]
            ])
            ->add('peoplesNumber', NumberType::class, [
                'required' => true,
                'empty_data' => 1,
                'label' => 'Liczba osób',
                'constraints' => [
                    (new GreaterThan([
                        'value' => 0,
                        'message' => 'Musi być przynajmniej jedna wynajmująca osoba'
                    ]))
                ],
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1
                ]
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApartmentReservation::class
        ]);
    }

    public function getName()
    {
        return 'reservation';
    }
}