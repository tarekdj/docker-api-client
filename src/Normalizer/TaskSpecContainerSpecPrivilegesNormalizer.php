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
class TaskSpecContainerSpecPrivilegesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivileges';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivileges';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\TaskSpecContainerSpecPrivileges();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CredentialSpec', $data) && $data['CredentialSpec'] !== null) {
            $object->setCredentialSpec($this->denormalizer->denormalize($data['CredentialSpec'], 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec', 'json', $context));
        }
        elseif (\array_key_exists('CredentialSpec', $data) && $data['CredentialSpec'] === null) {
            $object->setCredentialSpec(null);
        }
        if (\array_key_exists('SELinuxContext', $data) && $data['SELinuxContext'] !== null) {
            $object->setSELinuxContext($this->denormalizer->denormalize($data['SELinuxContext'], 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext', 'json', $context));
        }
        elseif (\array_key_exists('SELinuxContext', $data) && $data['SELinuxContext'] === null) {
            $object->setSELinuxContext(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('credentialSpec') && null !== $object->getCredentialSpec()) {
            $data['CredentialSpec'] = $this->normalizer->normalize($object->getCredentialSpec(), 'json', $context);
        }
        if ($object->isInitialized('sELinuxContext') && null !== $object->getSELinuxContext()) {
            $data['SELinuxContext'] = $this->normalizer->normalize($object->getSELinuxContext(), 'json', $context);
        }
        return $data;
    }
}