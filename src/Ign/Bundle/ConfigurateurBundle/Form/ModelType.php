<?php
namespace Ign\Bundle\ConfigurateurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ModelType extends AbstractType {

	/**
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('name', TextType::class, array(
			'label' => 'Name'
		))
			->add('description', TextareaType::class, array(
			'attr' => array(
				'resize' => 'none'
			),
			'label' => 'Description',
			'required' => false
		))
			->add('enregistrer', SubmitType::class, array(
			'label' => 'Save',
			'attr' => array(
				'formnovalidate' => 'formnovalidate'
			)
		));
	}

	/**
	 *
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Ign\Bundle\ConfigurateurBundle\Entity\Model'
		));
	}

	/**
	 *
	 * @return string
	 */
	public function getBlockPrefix() {
		return 'ign_bundle_configurateurbundle_model';
	}
}