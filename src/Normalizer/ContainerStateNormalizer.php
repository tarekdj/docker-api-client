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
class ContainerStateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerState';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerState';
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
        $object = new \Tarekdj\Docker\ApiClient\Model\ContainerState();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
            $object->setStatus($data['Status']);
        }
        elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('Running', $data) && $data['Running'] !== null) {
            $object->setRunning($data['Running']);
        }
        elseif (\array_key_exists('Running', $data) && $data['Running'] === null) {
            $object->setRunning(null);
        }
        if (\array_key_exists('Paused', $data) && $data['Paused'] !== null) {
            $object->setPaused($data['Paused']);
        }
        elseif (\array_key_exists('Paused', $data) && $data['Paused'] === null) {
            $object->setPaused(null);
        }
        if (\array_key_exists('Restarting', $data) && $data['Restarting'] !== null) {
            $object->setRestarting($data['Restarting']);
        }
        elseif (\array_key_exists('Restarting', $data) && $data['Restarting'] === null) {
            $object->setRestarting(null);
        }
        if (\array_key_exists('OOMKilled', $data) && $data['OOMKilled'] !== null) {
            $object->setOOMKilled($data['OOMKilled']);
        }
        elseif (\array_key_exists('OOMKilled', $data) && $data['OOMKilled'] === null) {
            $object->setOOMKilled(null);
        }
        if (\array_key_exists('Dead', $data) && $data['Dead'] !== null) {
            $object->setDead($data['Dead']);
        }
        elseif (\array_key_exists('Dead', $data) && $data['Dead'] === null) {
            $object->setDead(null);
        }
        if (\array_key_exists('Pid', $data) && $data['Pid'] !== null) {
            $object->setPid($data['Pid']);
        }
        elseif (\array_key_exists('Pid', $data) && $data['Pid'] === null) {
            $object->setPid(null);
        }
        if (\array_key_exists('ExitCode', $data) && $data['ExitCode'] !== null) {
            $object->setExitCode($data['ExitCode']);
        }
        elseif (\array_key_exists('ExitCode', $data) && $data['ExitCode'] === null) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('Error', $data) && $data['Error'] !== null) {
            $object->setError($data['Error']);
        }
        elseif (\array_key_exists('Error', $data) && $data['Error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('StartedAt', $data) && $data['StartedAt'] !== null) {
            $object->setStartedAt($data['StartedAt']);
        }
        elseif (\array_key_exists('StartedAt', $data) && $data['StartedAt'] === null) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('FinishedAt', $data) && $data['FinishedAt'] !== null) {
            $object->setFinishedAt($data['FinishedAt']);
        }
        elseif (\array_key_exists('FinishedAt', $data) && $data['FinishedAt'] === null) {
            $object->setFinishedAt(null);
        }
        if (\array_key_exists('Health', $data) && $data['Health'] !== null) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'Tarekdj\\Docker\\ApiClient\\Model\\Health', 'json', $context));
        }
        elseif (\array_key_exists('Health', $data) && $data['Health'] === null) {
            $object->setHealth(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('running') && null !== $object->getRunning()) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('paused') && null !== $object->getPaused()) {
            $data['Paused'] = $object->getPaused();
        }
        if ($object->isInitialized('restarting') && null !== $object->getRestarting()) {
            $data['Restarting'] = $object->getRestarting();
        }
        if ($object->isInitialized('oOMKilled') && null !== $object->getOOMKilled()) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if ($object->isInitialized('dead') && null !== $object->getDead()) {
            $data['Dead'] = $object->getDead();
        }
        if ($object->isInitialized('pid') && null !== $object->getPid()) {
            $data['Pid'] = $object->getPid();
        }
        if ($object->isInitialized('exitCode') && null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('error') && null !== $object->getError()) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('startedAt') && null !== $object->getStartedAt()) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if ($object->isInitialized('finishedAt') && null !== $object->getFinishedAt()) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if ($object->isInitialized('health') && null !== $object->getHealth()) {
            $data['Health'] = $this->normalizer->normalize($object->getHealth(), 'json', $context);
        }
        return $data;
    }
}