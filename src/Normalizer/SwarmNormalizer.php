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
class SwarmNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\Swarm';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\Swarm';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\Swarm();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
            $object->setID($data['ID']);
        }
        elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
            $object->setID(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Tarekdj\\Docker\\ApiClient\\Model\\ObjectVersion', 'json', $context));
        }
        elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
            $object->setCreatedAt($data['CreatedAt']);
        }
        elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] !== null) {
            $object->setUpdatedAt($data['UpdatedAt']);
        }
        elseif (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpec', 'json', $context));
        }
        elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
            $object->setSpec(null);
        }
        if (\array_key_exists('TLSInfo', $data) && $data['TLSInfo'] !== null) {
            $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Tarekdj\\Docker\\ApiClient\\Model\\TLSInfo', 'json', $context));
        }
        elseif (\array_key_exists('TLSInfo', $data) && $data['TLSInfo'] === null) {
            $object->setTLSInfo(null);
        }
        if (\array_key_exists('RootRotationInProgress', $data) && $data['RootRotationInProgress'] !== null) {
            $object->setRootRotationInProgress($data['RootRotationInProgress']);
        }
        elseif (\array_key_exists('RootRotationInProgress', $data) && $data['RootRotationInProgress'] === null) {
            $object->setRootRotationInProgress(null);
        }
        if (\array_key_exists('DataPathPort', $data) && $data['DataPathPort'] !== null) {
            $object->setDataPathPort($data['DataPathPort']);
        }
        elseif (\array_key_exists('DataPathPort', $data) && $data['DataPathPort'] === null) {
            $object->setDataPathPort(null);
        }
        if (\array_key_exists('DefaultAddrPool', $data) && $data['DefaultAddrPool'] !== null) {
            $values = array();
            foreach ($data['DefaultAddrPool'] as $value) {
                $values[] = $value;
            }
            $object->setDefaultAddrPool($values);
        }
        elseif (\array_key_exists('DefaultAddrPool', $data) && $data['DefaultAddrPool'] === null) {
            $object->setDefaultAddrPool(null);
        }
        if (\array_key_exists('SubnetSize', $data) && $data['SubnetSize'] !== null) {
            $object->setSubnetSize($data['SubnetSize']);
        }
        elseif (\array_key_exists('SubnetSize', $data) && $data['SubnetSize'] === null) {
            $object->setSubnetSize(null);
        }
        if (\array_key_exists('JoinTokens', $data) && $data['JoinTokens'] !== null) {
            $object->setJoinTokens($this->denormalizer->denormalize($data['JoinTokens'], 'Tarekdj\\Docker\\ApiClient\\Model\\JoinTokens', 'json', $context));
        }
        elseif (\array_key_exists('JoinTokens', $data) && $data['JoinTokens'] === null) {
            $object->setJoinTokens(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('iD') && null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
        }
        if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
            $data['UpdatedAt'] = $object->getUpdatedAt();
        }
        if ($object->isInitialized('spec') && null !== $object->getSpec()) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }
        if ($object->isInitialized('tLSInfo') && null !== $object->getTLSInfo()) {
            $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
        }
        if ($object->isInitialized('rootRotationInProgress') && null !== $object->getRootRotationInProgress()) {
            $data['RootRotationInProgress'] = $object->getRootRotationInProgress();
        }
        if ($object->isInitialized('dataPathPort') && null !== $object->getDataPathPort()) {
            $data['DataPathPort'] = $object->getDataPathPort();
        }
        if ($object->isInitialized('defaultAddrPool') && null !== $object->getDefaultAddrPool()) {
            $values = array();
            foreach ($object->getDefaultAddrPool() as $value) {
                $values[] = $value;
            }
            $data['DefaultAddrPool'] = $values;
        }
        if ($object->isInitialized('subnetSize') && null !== $object->getSubnetSize()) {
            $data['SubnetSize'] = $object->getSubnetSize();
        }
        if ($object->isInitialized('joinTokens') && null !== $object->getJoinTokens()) {
            $data['JoinTokens'] = $this->normalizer->normalize($object->getJoinTokens(), 'json', $context);
        }
        return $data;
    }
}