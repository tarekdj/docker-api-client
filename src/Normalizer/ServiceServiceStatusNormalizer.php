<?php

namespace Tarekdj\Docker\ApiClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ServiceServiceStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceServiceStatus';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceServiceStatus';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\ServiceServiceStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] !== null) {
            $object->setRunningTasks($data['RunningTasks']);
        }
        elseif (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] === null) {
            $object->setRunningTasks(null);
        }
        if (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] !== null) {
            $object->setDesiredTasks($data['DesiredTasks']);
        }
        elseif (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] === null) {
            $object->setDesiredTasks(null);
        }
        if (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] !== null) {
            $object->setCompletedTasks($data['CompletedTasks']);
        }
        elseif (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] === null) {
            $object->setCompletedTasks(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getRunningTasks()) {
            $data['RunningTasks'] = $object->getRunningTasks();
        }
        if (null !== $object->getDesiredTasks()) {
            $data['DesiredTasks'] = $object->getDesiredTasks();
        }
        if (null !== $object->getCompletedTasks()) {
            $data['CompletedTasks'] = $object->getCompletedTasks();
        }
        return $data;
    }
}