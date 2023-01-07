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
class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpec';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpec';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\SwarmSpec();
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
        if (\array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
            $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecOrchestration', 'json', $context));
        }
        elseif (\array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
            $object->setOrchestration(null);
        }
        if (\array_key_exists('Raft', $data) && $data['Raft'] !== null) {
            $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecRaft', 'json', $context));
        }
        elseif (\array_key_exists('Raft', $data) && $data['Raft'] === null) {
            $object->setRaft(null);
        }
        if (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
            $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecDispatcher', 'json', $context));
        }
        elseif (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
            $object->setDispatcher(null);
        }
        if (\array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
            $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfig', 'json', $context));
        }
        elseif (\array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
            $object->setCAConfig(null);
        }
        if (\array_key_exists('EncryptionConfig', $data) && $data['EncryptionConfig'] !== null) {
            $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecEncryptionConfig', 'json', $context));
        }
        elseif (\array_key_exists('EncryptionConfig', $data) && $data['EncryptionConfig'] === null) {
            $object->setEncryptionConfig(null);
        }
        if (\array_key_exists('TaskDefaults', $data) && $data['TaskDefaults'] !== null) {
            $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecTaskDefaults', 'json', $context));
        }
        elseif (\array_key_exists('TaskDefaults', $data) && $data['TaskDefaults'] === null) {
            $object->setTaskDefaults(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if (null !== $object->getLabels()) {
            $values = array();
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if (null !== $object->getOrchestration()) {
            $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
        }
        if (null !== $object->getRaft()) {
            $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
        }
        if (null !== $object->getDispatcher()) {
            $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
        }
        if (null !== $object->getCAConfig()) {
            $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
        }
        if (null !== $object->getEncryptionConfig()) {
            $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
        }
        if (null !== $object->getTaskDefaults()) {
            $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
        }
        return $data;
    }
}