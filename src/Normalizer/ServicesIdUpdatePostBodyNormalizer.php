<?php

namespace Tarekdj\Docker\ApiClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ServicesIdUpdatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesIdUpdatePostBody';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesIdUpdatePostBody';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Tarekdj\Docker\ApiClient\Model\ServicesIdUpdatePostBody();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
        }
        elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('TaskTemplate', $data) && $data['TaskTemplate'] !== null) {
            $object->setTaskTemplate($this->denormalizer->denormalize($data['TaskTemplate'], 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpec', 'json', $context));
        }
        elseif (\array_key_exists('TaskTemplate', $data) && $data['TaskTemplate'] === null) {
            $object->setTaskTemplate(null);
        }
        if (\array_key_exists('Mode', $data) && $data['Mode'] !== null) {
            $object->setMode($this->denormalizer->denormalize($data['Mode'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecMode', 'json', $context));
        }
        elseif (\array_key_exists('Mode', $data) && $data['Mode'] === null) {
            $object->setMode(null);
        }
        if (\array_key_exists('UpdateConfig', $data) && $data['UpdateConfig'] !== null) {
            $object->setUpdateConfig($this->denormalizer->denormalize($data['UpdateConfig'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecUpdateConfig', 'json', $context));
        }
        elseif (\array_key_exists('UpdateConfig', $data) && $data['UpdateConfig'] === null) {
            $object->setUpdateConfig(null);
        }
        if (\array_key_exists('RollbackConfig', $data) && $data['RollbackConfig'] !== null) {
            $object->setRollbackConfig($this->denormalizer->denormalize($data['RollbackConfig'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecRollbackConfig', 'json', $context));
        }
        elseif (\array_key_exists('RollbackConfig', $data) && $data['RollbackConfig'] === null) {
            $object->setRollbackConfig(null);
        }
        if (\array_key_exists('Networks', $data) && $data['Networks'] !== null) {
            $values_1 = array();
            foreach ($data['Networks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Tarekdj\\Docker\\ApiClient\\Model\\NetworkAttachmentConfig', 'json', $context);
            }
            $object->setNetworks($values_1);
        }
        elseif (\array_key_exists('Networks', $data) && $data['Networks'] === null) {
            $object->setNetworks(null);
        }
        if (\array_key_exists('EndpointSpec', $data) && $data['EndpointSpec'] !== null) {
            $object->setEndpointSpec($this->denormalizer->denormalize($data['EndpointSpec'], 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointSpec', 'json', $context));
        }
        elseif (\array_key_exists('EndpointSpec', $data) && $data['EndpointSpec'] === null) {
            $object->setEndpointSpec(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values = array();
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('taskTemplate') && null !== $object->getTaskTemplate()) {
            $data['TaskTemplate'] = $this->normalizer->normalize($object->getTaskTemplate(), 'json', $context);
        }
        if ($object->isInitialized('mode') && null !== $object->getMode()) {
            $data['Mode'] = $this->normalizer->normalize($object->getMode(), 'json', $context);
        }
        if ($object->isInitialized('updateConfig') && null !== $object->getUpdateConfig()) {
            $data['UpdateConfig'] = $this->normalizer->normalize($object->getUpdateConfig(), 'json', $context);
        }
        if ($object->isInitialized('rollbackConfig') && null !== $object->getRollbackConfig()) {
            $data['RollbackConfig'] = $this->normalizer->normalize($object->getRollbackConfig(), 'json', $context);
        }
        if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
            $values_1 = array();
            foreach ($object->getNetworks() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Networks'] = $values_1;
        }
        if ($object->isInitialized('endpointSpec') && null !== $object->getEndpointSpec()) {
            $data['EndpointSpec'] = $this->normalizer->normalize($object->getEndpointSpec(), 'json', $context);
        }
        return $data;
    }
}