<?php
namespace Ign\Bundle\OGAMConfigurateurBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DataType extends AbstractType {

	/**
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('label', TextType::class, array(
			'label' => 'Label',
			'attr' => array(
				'data-toggle' => 'tooltip',
				'data-placement' => 'left',
				'title' => 'data.label.tooltip'
			)
		))
			->add('name', TextType::class, array(
			'label' => 'ColumnName',
			'attr' => array(
				'data-toggle' => 'tooltip',
				'data-placement' => 'left',
				'title' => 'data.name.tooltip'
			)
		))
			->add('unit', EntityType::class, array(
			'class' => 'IgnOGAMConfigurateurBundle:Unit',
			'placeholder' => 'Choose',
			'query_builder' => function (EntityRepository $er) {
				return $er->createQueryBuilder('d')
					->orderBy('d.name', 'ASC');
			},
			'label' => 'Unit'
		))
			->add('definition', TextareaType::class, array(
			'label' => 'Description',
			'attr' => array(
				'resize' => 'none'
			),
			'required' => false
		))
			->add('comment', TextareaType::class, array(
			'label' => 'Comment',
			'attr' => array(
				'resize' => 'none'
			),
			'required' => false
		));
	}

	/**
	 *
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Ign\Bundle\OGAMConfigurateurBundle\Entity\Data'
		));
	}

	/**
	 *
	 * @return string
	 */
	public function getBlockPrefix() {
		return 'ign_bundle_configurateurbundle_data';
	}
}