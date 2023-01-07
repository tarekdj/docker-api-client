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
class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    /**
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\Service';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\Service';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\Service();
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
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpec', 'json', $context));
        }
        elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
            $object->setSpec(null);
        }
        if (\array_key_exists('Endpoint', $data) && $data['Endpoint'] !== null) {
            $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceEndpoint', 'json', $context));
        }
        elseif (\array_key_exists('Endpoint', $data) && $data['Endpoint'] === null) {
            $object->setEndpoint(null);
        }
        if (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] !== null) {
            $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceUpdateStatus', 'json', $context));
        }
        elseif (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] === null) {
            $object->setUpdateStatus(null);
        }
        if (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] !== null) {
            $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceServiceStatus', 'json', $context));
        }
        elseif (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] === null) {
            $object->setServiceStatus(null);
        }
        if (\array_key_exists('JobStatus', $data) && $data['JobStatus'] !== null) {
            $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceJobStatus', 'json', $context));
        }
        elseif (\array_key_exists('JobStatus', $data) && $data['JobStatus'] === null) {
            $object->setJobStatus(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if (null !== $object->getVersion()) {
            $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
        }
        if (null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if (null !== $object->getUpdatedAt()) {
            $data['UpdatedAt'] = $object->getUpdatedAt();
        }
        if (null !== $object->getSpec()) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }
        if (null !== $object->getEndpoint()) {
            $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
        }
        if (null !== $object->getUpdateStatus()) {
            $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
        }
        if (null !== $object->getServiceStatus()) {
            $data['ServiceStatus'] = $this->normalizer->normalize($object->getServiceStatus(), 'json', $context);
        }
        if (null !== $object->getJobStatus()) {
            $data['JobStatus'] = $this->normalizer->normalize($object->getJobStatus(), 'json', $context);
        }
        return $data;
    }
}