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
class SystemVersionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersion';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersion';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\SystemVersion();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Platform', $data) && $data['Platform'] !== null) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersionPlatform', 'json', $context));
        }
        elseif (\array_key_exists('Platform', $data) && $data['Platform'] === null) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('Components', $data) && $data['Components'] !== null) {
            $values = array();
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersionComponentsItem', 'json', $context);
            }
            $object->setComponents($values);
        }
        elseif (\array_key_exists('Components', $data) && $data['Components'] === null) {
            $object->setComponents(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($data['Version']);
        }
        elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('ApiVersion', $data) && $data['ApiVersion'] !== null) {
            $object->setApiVersion($data['ApiVersion']);
        }
        elseif (\array_key_exists('ApiVersion', $data) && $data['ApiVersion'] === null) {
            $object->setApiVersion(null);
        }
        if (\array_key_exists('MinAPIVersion', $data) && $data['MinAPIVersion'] !== null) {
            $object->setMinAPIVersion($data['MinAPIVersion']);
        }
        elseif (\array_key_exists('MinAPIVersion', $data) && $data['MinAPIVersion'] === null) {
            $object->setMinAPIVersion(null);
        }
        if (\array_key_exists('GitCommit', $data) && $data['GitCommit'] !== null) {
            $object->setGitCommit($data['GitCommit']);
        }
        elseif (\array_key_exists('GitCommit', $data) && $data['GitCommit'] === null) {
            $object->setGitCommit(null);
        }
        if (\array_key_exists('GoVersion', $data) && $data['GoVersion'] !== null) {
            $object->setGoVersion($data['GoVersion']);
        }
        elseif (\array_key_exists('GoVersion', $data) && $data['GoVersion'] === null) {
            $object->setGoVersion(null);
        }
        if (\array_key_exists('Os', $data) && $data['Os'] !== null) {
            $object->setOs($data['Os']);
        }
        elseif (\array_key_exists('Os', $data) && $data['Os'] === null) {
            $object->setOs(null);
        }
        if (\array_key_exists('Arch', $data) && $data['Arch'] !== null) {
            $object->setArch($data['Arch']);
        }
        elseif (\array_key_exists('Arch', $data) && $data['Arch'] === null) {
            $object->setArch(null);
        }
        if (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] !== null) {
            $object->setKernelVersion($data['KernelVersion']);
        }
        elseif (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] === null) {
            $object->setKernelVersion(null);
        }
        if (\array_key_exists('Experimental', $data) && $data['Experimental'] !== null) {
            $object->setExperimental($data['Experimental']);
        }
        elseif (\array_key_exists('Experimental', $data) && $data['Experimental'] === null) {
            $object->setExperimental(null);
        }
        if (\array_key_exists('BuildTime', $data) && $data['BuildTime'] !== null) {
            $object->setBuildTime($data['BuildTime']);
        }
        elseif (\array_key_exists('BuildTime', $data) && $data['BuildTime'] === null) {
            $object->setBuildTime(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
            $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
        }
        if ($object->isInitialized('components') && null !== $object->getComponents()) {
            $values = array();
            foreach ($object->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Components'] = $values;
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['Version'] = $object->getVersion();
        }
        if ($object->isInitialized('apiVersion') && null !== $object->getApiVersion()) {
            $data['ApiVersion'] = $object->getApiVersion();
        }
        if ($object->isInitialized('minAPIVersion') && null !== $object->getMinAPIVersion()) {
            $data['MinAPIVersion'] = $object->getMinAPIVersion();
        }
        if ($object->isInitialized('gitCommit') && null !== $object->getGitCommit()) {
            $data['GitCommit'] = $object->getGitCommit();
        }
        if ($object->isInitialized('goVersion') && null !== $object->getGoVersion()) {
            $data['GoVersion'] = $object->getGoVersion();
        }
        if ($object->isInitialized('os') && null !== $object->getOs()) {
            $data['Os'] = $object->getOs();
        }
        if ($object->isInitialized('arch') && null !== $object->getArch()) {
            $data['Arch'] = $object->getArch();
        }
        if ($object->isInitialized('kernelVersion') && null !== $object->getKernelVersion()) {
            $data['KernelVersion'] = $object->getKernelVersion();
        }
        if ($object->isInitialized('experimental') && null !== $object->getExperimental()) {
            $data['Experimental'] = $object->getExperimental();
        }
        if ($object->isInitialized('buildTime') && null !== $object->getBuildTime()) {
            $data['BuildTime'] = $object->getBuildTime();
        }
        return $data;
    }
}