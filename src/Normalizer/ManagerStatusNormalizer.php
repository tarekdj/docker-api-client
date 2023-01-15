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
class ManagerStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\ManagerStatus';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\ManagerStatus';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\ManagerStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Leader', $data) && $data['Leader'] !== null) {
            $object->setLeader($data['Leader']);
        }
        elseif (\array_key_exists('Leader', $data) && $data['Leader'] === null) {
            $object->setLeader(null);
        }
        if (\array_key_exists('Reachability', $data) && $data['Reachability'] !== null) {
            $object->setReachability($data['Reachability']);
        }
        elseif (\array_key_exists('Reachability', $data) && $data['Reachability'] === null) {
            $object->setReachability(null);
        }
        if (\array_key_exists('Addr', $data) && $data['Addr'] !== null) {
            $object->setAddr($data['Addr']);
        }
        elseif (\array_key_exists('Addr', $data) && $data['Addr'] === null) {
            $object->setAddr(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('leader') && null !== $object->getLeader()) {
            $data['Leader'] = $object->getLeader();
        }
        if ($object->isInitialized('reachability') && null !== $object->getReachability()) {
            $data['Reachability'] = $object->getReachability();
        }
        if ($object->isInitialized('addr') && null !== $object->getAddr()) {
            $data['Addr'] = $object->getAddr();
        }
        return $data;
    }
}