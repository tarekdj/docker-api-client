<?php

namespace Tarekdj\Docker\ApiClient\Normalizer;

use Tarekdj\Docker\ApiClient\Runtime\Normalizer\CheckArray;
use Tarekdj\Docker\ApiClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = array('Tarekdj\\Docker\\ApiClient\\Model\\Port' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PortNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\MountPoint' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountPointNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\DeviceMapping' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\DeviceMappingNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\DeviceRequest' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\DeviceRequestNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ThrottleDevice' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ThrottleDeviceNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Mount' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\MountBindOptions' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountBindOptionsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\MountVolumeOptions' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountVolumeOptionsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\MountVolumeOptionsDriverConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountVolumeOptionsDriverConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\MountTmpfsOptions' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\MountTmpfsOptionsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\RestartPolicy' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\RestartPolicyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Resources' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ResourcesNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ResourcesBlkioWeightDeviceItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ResourcesBlkioWeightDeviceItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ResourcesUlimitsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ResourcesUlimitsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Limit' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\LimitNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ResourceObject' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ResourceObjectNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\GenericResourcesItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\GenericResourcesItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\GenericResourcesItemNamedResourceSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\GenericResourcesItemNamedResourceSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\GenericResourcesItemDiscreteResourceSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\GenericResourcesItemDiscreteResourceSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\HealthConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\HealthConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Health' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\HealthNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\HealthcheckResult' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\HealthcheckResultNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\HostConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\HostConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\HostConfigLogConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\HostConfigLogConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworkingConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworkingConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworkSettings' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworkSettingsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Address' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\AddressNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PortBinding' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PortBindingNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\GraphDriverData' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\GraphDriverDataNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageInspect' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageInspectNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageInspectRootFS' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageInspectRootFSNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageInspectMetadata' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageInspectMetadataNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageSummary' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageSummaryNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\AuthConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\AuthConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ProcessConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ProcessConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Volume' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\VolumeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\VolumeUsageData' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\VolumeUsageDataNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\VolumeCreateOptions' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\VolumeCreateOptionsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\VolumeListResponse' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\VolumeListResponseNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Network' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworkNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\IPAM' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\IPAMNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\IPAMConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\IPAMConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworkContainer' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworkContainerNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\BuildInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\BuildInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\BuildCache' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\BuildCacheNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageID' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageIDNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\CreateImageInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\CreateImageInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PushImageInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PushImageInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorDetail' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ErrorDetailNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ProgressDetail' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ProgressDetailNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ErrorResponseNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\IdResponse' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\IdResponseNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointSettings' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EndpointSettingsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointIPAMConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EndpointIPAMConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginMount' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginMountNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginDevice' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginDeviceNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginEnv' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginEnvNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginInterfaceType' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginInterfaceTypeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginPrivilege' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginPrivilegeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Plugin' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginSettings' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginSettingsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigInterface' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigInterfaceNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigUser' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigUserNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigNetwork' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigNetworkNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigLinux' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigLinuxNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigArgs' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigArgsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginConfigRootfs' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginConfigRootfsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ObjectVersion' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ObjectVersionNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NodeSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NodeSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Node' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NodeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NodeDescription' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NodeDescriptionNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Platform' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PlatformNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EngineDescription' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EngineDescriptionNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EngineDescriptionPluginsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EngineDescriptionPluginsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TLSInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TLSInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NodeStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NodeStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ManagerStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ManagerStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecOrchestration' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecOrchestrationNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecRaft' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecRaftNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecDispatcher' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecDispatcherNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecCAConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecCAConfigExternalCAsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecCAConfigExternalCAsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecEncryptionConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecEncryptionConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecTaskDefaults' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecTaskDefaultsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmSpecTaskDefaultsLogDriver' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmSpecTaskDefaultsLogDriverNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ClusterInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ClusterInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\JoinTokens' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\JoinTokensNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Swarm' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecPluginSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecPluginSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivileges' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecPrivilegesNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecDNSConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecDNSConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecSecretsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecSecretsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecSecretsItemFile' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecSecretsItemFileNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecConfigsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecConfigsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecConfigsItemFile' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecConfigsItemFileNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecContainerSpecUlimitsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecContainerSpecUlimitsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecNetworkAttachmentSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecNetworkAttachmentSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecResources' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecResourcesNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecRestartPolicy' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecRestartPolicyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecPlacement' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecPlacementNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecPlacementPreferencesItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecPlacementPreferencesItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecPlacementPreferencesItemSpread' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecPlacementPreferencesItemSpreadNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskSpecLogDriver' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskSpecLogDriverNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Task' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\TaskStatusContainerStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\TaskStatusContainerStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecMode' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecModeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecModeReplicated' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecModeReplicatedNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecModeReplicatedJob' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecModeReplicatedJobNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecUpdateConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecUpdateConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceSpecRollbackConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceSpecRollbackConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointPortConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EndpointPortConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EndpointSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EndpointSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Service' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceEndpoint' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceEndpointNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceEndpointVirtualIPsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceEndpointVirtualIPsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceUpdateStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceUpdateStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceServiceStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceServiceStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceJobStatus' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceJobStatusNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImageDeleteResponseItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImageDeleteResponseItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServiceUpdateResponse' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServiceUpdateResponseNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerSummary' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerSummaryNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerSummaryHostConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerSummaryHostConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerSummaryNetworkSettings' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerSummaryNetworkSettingsNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Driver' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\DriverNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SecretSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SecretSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Secret' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SecretNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ConfigSpec' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ConfigSpecNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Config' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerState' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerStateNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerWaitResponse' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerWaitResponseNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainerWaitExitError' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainerWaitExitErrorNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersion' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemVersionNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersionPlatform' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemVersionPlatformNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemVersionComponentsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemVersionComponentsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemInfoDefaultAddressPoolsItem' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemInfoDefaultAddressPoolsItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PluginsInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PluginsInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\RegistryServiceConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\RegistryServiceConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\IndexInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\IndexInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Runtime' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\RuntimeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\Commit' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\CommitNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmInfo' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmInfoNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\PeerNode' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\PeerNodeNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworkAttachmentConfig' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworkAttachmentConfigNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EventActor' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EventActorNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\EventMessage' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\EventMessageNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\OCIDescriptor' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\OCIDescriptorNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\OCIPlatform' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\OCIPlatformNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\DistributionInspect' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\DistributionInspectNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersCreatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersCreatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersCreatePostResponse201' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersCreatePostResponse201Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdJsonGetResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdJsonGetResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdTopGetResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdTopGetResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdChangesGetResponse200Item' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdChangesGetResponse200ItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdUpdatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdUpdatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdUpdatePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdUpdatePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersPrunePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersPrunePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\BuildPrunePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\BuildPrunePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImagesNameHistoryGetResponse200Item' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImagesNameHistoryGetResponse200ItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImagesSearchGetResponse200Item' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImagesSearchGetResponse200ItemNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ImagesPrunePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ImagesPrunePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\AuthPostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\AuthPostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SystemDfGetResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SystemDfGetResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ContainersIdExecPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ContainersIdExecPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ExecIdStartPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ExecIdStartPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ExecIdJsonGetResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ExecIdJsonGetResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\VolumesPrunePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\VolumesPrunePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworksCreatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworksCreatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworksCreatePostResponse201' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworksCreatePostResponse201Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworksIdConnectPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworksIdConnectPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworksIdDisconnectPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworksIdDisconnectPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\NetworksPrunePostResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\NetworksPrunePostResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmInitPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmInitPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmJoinPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmJoinPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmUnlockkeyGetResponse200' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmUnlockkeyGetResponse200Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmUnlockPostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SwarmUnlockPostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesCreatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServicesCreatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesCreatePostResponse201' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServicesCreatePostResponse201Normalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesIdUpdatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ServicesIdUpdatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\SecretsCreatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\SecretsCreatePostBodyNormalizer', 'Tarekdj\\Docker\\ApiClient\\Model\\ConfigsCreatePostBody' => 'Tarekdj\\Docker\\ApiClient\\Normalizer\\ConfigsCreatePostBodyNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Tarekdj\\Docker\\ApiClient\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}