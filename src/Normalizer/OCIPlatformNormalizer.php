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
class OCIPlatformNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\OCIPlatform';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\OCIPlatform';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\OCIPlatform();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('architecture', $data) && $data['architecture'] !== null) {
            $object->setArchitecture($data['architecture']);
        }
        elseif (\array_key_exists('architecture', $data) && $data['architecture'] === null) {
            $object->setArchitecture(null);
        }
        if (\array_key_exists('os', $data) && $data['os'] !== null) {
            $object->setOs($data['os']);
        }
        elseif (\array_key_exists('os', $data) && $data['os'] === null) {
            $object->setOs(null);
        }
        if (\array_key_exists('os.version', $data) && $data['os.version'] !== null) {
            $object->setOsVersion($data['os.version']);
        }
        elseif (\array_key_exists('os.version', $data) && $data['os.version'] === null) {
            $object->setOsVersion(null);
        }
        if (\array_key_exists('os.features', $data) && $data['os.features'] !== null) {
            $values = array();
            foreach ($data['os.features'] as $value) {
                $values[] = $value;
            }
            $object->setOsFeatures($values);
        }
        elseif (\array_key_exists('os.features', $data) && $data['os.features'] === null) {
            $object->setOsFeatures(null);
        }
        if (\array_key_exists('variant', $data) && $data['variant'] !== null) {
            $object->setVariant($data['variant']);
        }
        elseif (\array_key_exists('variant', $data) && $data['variant'] === null) {
            $object->setVariant(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('architecture') && null !== $object->getArchitecture()) {
            $data['architecture'] = $object->getArchitecture();
        }
        if ($object->isInitialized('os') && null !== $object->getOs()) {
            $data['os'] = $object->getOs();
        }
        if ($object->isInitialized('osVersion') && null !== $object->getOsVersion()) {
            $data['os.version'] = $object->getOsVersion();
        }
        if ($object->isInitialized('osFeatures') && null !== $object->getOsFeatures()) {
            $values = array();
            foreach ($object->getOsFeatures() as $value) {
                $values[] = $value;
            }
            $data['os.features'] = $values;
        }
        if ($object->isInitialized('variant') && null !== $object->getVariant()) {
            $data['variant'] = $object->getVariant();
        }
        return $data;
    }
}