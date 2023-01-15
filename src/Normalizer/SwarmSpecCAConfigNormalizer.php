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
class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfig';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\SwarmSpecCAConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] !== null) {
            $object->setNodeCertExpiry($data['NodeCertExpiry']);
        }
        elseif (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] === null) {
            $object->setNodeCertExpiry(null);
        }
        if (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] !== null) {
            $values = array();
            foreach ($data['ExternalCAs'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfigExternalCAsItem', 'json', $context);
            }
            $object->setExternalCAs($values);
        }
        elseif (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] === null) {
            $object->setExternalCAs(null);
        }
        if (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] !== null) {
            $object->setSigningCACert($data['SigningCACert']);
        }
        elseif (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] === null) {
            $object->setSigningCACert(null);
        }
        if (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] !== null) {
            $object->setSigningCAKey($data['SigningCAKey']);
        }
        elseif (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] === null) {
            $object->setSigningCAKey(null);
        }
        if (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] !== null) {
            $object->setForceRotate($data['ForceRotate']);
        }
        elseif (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] === null) {
            $object->setForceRotate(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('nodeCertExpiry') && null !== $object->getNodeCertExpiry()) {
            $data['NodeCertExpiry'] = $object->getNodeCertExpiry();
        }
        if ($object->isInitialized('externalCAs') && null !== $object->getExternalCAs()) {
            $values = array();
            foreach ($object->getExternalCAs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['ExternalCAs'] = $values;
        }
        if ($object->isInitialized('signingCACert') && null !== $object->getSigningCACert()) {
            $data['SigningCACert'] = $object->getSigningCACert();
        }
        if ($object->isInitialized('signingCAKey') && null !== $object->getSigningCAKey()) {
            $data['SigningCAKey'] = $object->getSigningCAKey();
        }
        if ($object->isInitialized('forceRotate') && null !== $object->getForceRotate()) {
            $data['ForceRotate'] = $object->getForceRotate();
        }
        return $data;
    }
}