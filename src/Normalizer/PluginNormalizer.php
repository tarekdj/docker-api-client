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
class PluginNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\Plugin';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\Plugin';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\Plugin();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
        }
        elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Enabled', $data) && $data['Enabled'] !== null) {
            $object->setEnabled($data['Enabled']);
        }
        elseif (\array_key_exists('Enabled', $data) && $data['Enabled'] === null) {
            $object->setEnabled(null);
        }
        if (\array_key_exists('Settings', $data) && $data['Settings'] !== null) {
            $object->setSettings($this->denormalizer->denormalize($data['Settings'], 'Tarekdj\\Docker\\ApiClient\\Model\\PluginSettings', 'json', $context));
        }
        elseif (\array_key_exists('Settings', $data) && $data['Settings'] === null) {
            $object->setSettings(null);
        }
        if (\array_key_exists('PluginReference', $data) && $data['PluginReference'] !== null) {
            $object->setPluginReference($data['PluginReference']);
        }
        elseif (\array_key_exists('PluginReference', $data) && $data['PluginReference'] === null) {
            $object->setPluginReference(null);
        }
        if (\array_key_exists('Config', $data) && $data['Config'] !== null) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfig', 'json', $context));
        }
        elseif (\array_key_exists('Config', $data) && $data['Config'] === null) {
            $object->setConfig(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['Id'] = $object->getId();
        }
        $data['Name'] = $object->getName();
        $data['Enabled'] = $object->getEnabled();
        $data['Settings'] = $this->normalizer->normalize($object->getSettings(), 'json', $context);
        if ($object->isInitialized('pluginReference') && null !== $object->getPluginReference()) {
            $data['PluginReference'] = $object->getPluginReference();
        }
        $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        return $data;
    }
}