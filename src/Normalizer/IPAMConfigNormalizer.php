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
class IPAMConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\IPAMConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\IPAMConfig';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\IPAMConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Subnet', $data) && $data['Subnet'] !== null) {
            $object->setSubnet($data['Subnet']);
        }
        elseif (\array_key_exists('Subnet', $data) && $data['Subnet'] === null) {
            $object->setSubnet(null);
        }
        if (\array_key_exists('IPRange', $data) && $data['IPRange'] !== null) {
            $object->setIPRange($data['IPRange']);
        }
        elseif (\array_key_exists('IPRange', $data) && $data['IPRange'] === null) {
            $object->setIPRange(null);
        }
        if (\array_key_exists('Gateway', $data) && $data['Gateway'] !== null) {
            $object->setGateway($data['Gateway']);
        }
        elseif (\array_key_exists('Gateway', $data) && $data['Gateway'] === null) {
            $object->setGateway(null);
        }
        if (\array_key_exists('AuxiliaryAddresses', $data) && $data['AuxiliaryAddresses'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['AuxiliaryAddresses'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setAuxiliaryAddresses($values);
        }
        elseif (\array_key_exists('AuxiliaryAddresses', $data) && $data['AuxiliaryAddresses'] === null) {
            $object->setAuxiliaryAddresses(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('subnet') && null !== $object->getSubnet()) {
            $data['Subnet'] = $object->getSubnet();
        }
        if ($object->isInitialized('iPRange') && null !== $object->getIPRange()) {
            $data['IPRange'] = $object->getIPRange();
        }
        if ($object->isInitialized('gateway') && null !== $object->getGateway()) {
            $data['Gateway'] = $object->getGateway();
        }
        if ($object->isInitialized('auxiliaryAddresses') && null !== $object->getAuxiliaryAddresses()) {
            $values = array();
            foreach ($object->getAuxiliaryAddresses() as $key => $value) {
                $values[$key] = $value;
            }
            $data['AuxiliaryAddresses'] = $values;
        }
        return $data;
    }
}