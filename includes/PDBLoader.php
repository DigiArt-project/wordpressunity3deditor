<?php

//1 	H 	Hydrogen
//2 	He 	Helium
//3 	Li 	Lithium
//4 	Be 	Beryllium
//5 	B 	Boron
//6 	C 	Carbon
//7 	N 	Nitrogen
//8 	O 	Oxygen
//9 	F 	Fluorine
//10 	Ne 	Neon
//11 	Na 	Sodium
//12 	Mg 	Magnesium
//13 	Al 	Aluminum
//14 	Si 	Silicon
//15 	P 	Phosphorus
//16 	S 	Sulfur
//17 	Cl 	Chlorine
//18 	Ar 	Argon
//19 	K 	Potassium
//20 	Ca 	Calcium
//21 	Sc 	Scandium
//22 	Ti 	Titanium
//23 	V 	Vanadium
//24 	Cr 	Chromium
//25 	Mn 	Manganese
//26 	Fe 	Iron
//27 	Co 	Cobalt
//28 	Ni 	Nickel
//29 	Cu 	Copper
//30 	Zn 	Zinc
//31 	Ga 	Gallium
//32 	Ge 	Germanium
//33 	As 	Arsenic
//34 	Se 	Selenium
//35 	Br 	Bromine
//36 	Kr 	Krypton
//37 	Rb 	Rubidium
//38 	Sr 	Strontium
//39 	Y 	Yttrium
//40 	Zr 	Zirconium
//41 	Nb 	Niobium
//42 	Mo 	Molybdenum
//43 	Tc 	Technetium
//44 	Ru 	Ruthenium
//45 	Rh 	Rhodium
//46 	Pd 	Palladium
//47 	Ag 	Silver
//48 	Cd 	Cadmium
//49 	In 	Indium
//50 	Sn 	Tin
//51 	Sb 	Antimony
//52 	Te 	Tellurium
//53 	I 	Iodine
//54 	Xe 	Xenon
//55 	Cs 	Cesium
//56 	Ba 	Barium
//57 	La 	Lanthanum
//58 	Ce 	Cerium
//59 	Pr 	Praseodymium
//60 	Nd 	Neodymium
//61 	Pm 	Promethium
//62 	Sm 	Samarium
//63 	Eu 	Europium
//64 	Gd 	Gadolinium
//65 	Tb 	Terbium
//66 	Dy 	Dysprosium
//67 	Ho 	Holmium
//68 	Er 	Erbium
//69 	Tm 	Thulium
//70 	Yb 	Ytterbium
//71 	Lu 	Lutetium
//72 	Hf 	Hafnium
//73 	Ta 	Tantalum
//74 	W 	Tungsten
//75 	Re 	Rhenium
//76 	Os 	Osmium
//77 	Ir 	Iridium
//78 	Pt 	Platinum
//79 	Au 	Gold
//80 	Hg 	Mercury
//81 	Tl 	Thallium
//82 	Pb 	Lead
//83 	Bi 	Bismuth
//84 	Po 	Polonium
//85 	At 	Astatine
//86 	Rn 	Radon
//87 	Fr 	Francium
//88 	Ra 	Radium
//89 	Ac 	Actinium
//90 	Th 	Thorium
//91 	Pa 	Protactinium
//92 	U 	Uranium
//93 	Np 	Neptunium
//94 	Pu 	Plutonium
//95 	Am 	Americium
//96 	Cm 	Curium
//97 	Bk 	Berkelium
//98 	Cf 	Californium
//99 	Es 	Einsteinium
//100 	Fm 	Fermium
//101 	Md 	Mendelevium
//102 	No 	Nobelium
//103 	Lr 	Lawrencium
//104 	Rf 	Rutherfordium
//105 	Db 	Dubnium
//106 	Sg 	Seaborgium
//107 	Bh 	Bohrium
//108 	Hs 	Hassium
//109 	Mt 	Meitnerium
//110 	Ds 	Darmstadtium
//111 	Rg 	Roentgenium
//112 	Cn 	Copernicium
//113 	Nh 	Nihonium
//114 	Fl 	Flerovium
//115 	Mc 	Moscovium
//116 	Lv 	Livermorium
//117 	Ts 	Tennessine
//118 	Og 	Oganesson


class PDBLoader {
 
    public $_content;
    
    public $atomNames = array("h"=>"Hydrogen", "c"=>"carbon", "n"=>"Nitrogen", "o"=>"Oxygen", "na"=>"Natrium", "cl"=>"Chlorium");

    
    
    
    public $CPK = array("h" => array(255, 255, 255), "he" => array(217, 255, 255), "li" => array(204, 128, 255), "be" => array(194, 255, 0), "b" => array(255, 181, 181), "c" => array(144, 144, 144), "n" => array(48, 80, 248), "o" => array(255, 13, 13), "f" => array(144, 224, 80), "ne" => array(179, 227, 245), "na" => array(171, 92, 242), "mg" => array(138, 255, 0), "al" => array(191, 166, 166), "si" => array(240, 200, 160), "p" => array(255, 128, 0), "s" => array(255, 255, 48), "cl" => array(31, 240, 31), "ar" => array(128, 209, 227), "k" => array(143, 64, 212), "ca" => array(61, 255, 0), "sc" => array(230, 230, 230), "ti" => array(191, 194, 199), "v" => array(166, 166, 171), "cr" => array(138, 153, 199), "mn" => array(156, 122, 199), "fe" => array(224, 102, 51), "co" => array(240, 144, 160), "ni" => array(80, 208, 80), "cu" => array(200, 128, 51), "zn" => array(125, 128, 176), "ga" => array(194, 143, 143), "ge" => array(102, 143, 143), "as" => array(189, 128, 227), "se" => array(255, 161, 0), "br" => array(166, 41, 41), "kr" => array(92, 184, 209), "rb" => array(112, 46, 176), "sr" => array(0, 255, 0), "y" => array(148, 255, 255), "zr" => array(148, 224, 224), "nb" => array(115, 194, 201), "mo" => array(84, 181, 181), "tc" => array(59, 158, 158), "ru" => array(36, 143, 143), "rh" => array(10, 125, 140), "pd" => array(0, 105, 133), "ag" => array(192, 192, 192), "cd" => array(255, 217, 143), "in" => array(166, 117, 115), "sn" => array(102, 128, 128), "sb" => array(158, 99, 181), "te" => array(212, 122, 0), "i" => array(148, 0, 148), "xe" => array(66, 158, 176), "cs" => array(87, 23, 143), "ba" => array(0, 201, 0), "la" => array(112, 212, 255), "ce" => array(255, 255, 199), "pr" => array(217, 255, 199), "nd" => array(199, 255, 199), "pm" => array(163, 255, 199), "sm" => array(143, 255, 199), "eu" => array(97, 255, 199), "gd" => array(69, 255, 199), "tb" => array(48, 255, 199), "dy" => array(31, 255, 199), "ho" => array(0, 255, 156), "er" => array(0, 230, 117), "tm" => array(0, 212, 82), "yb" => array(0, 191, 56), "lu" => array(0, 171, 36), "hf" => array(77, 194, 255), "ta" => array(77, 166, 255), "w" => array(33, 148, 214), "re" => array(38, 125, 171), "os" => array(38, 102, 150), "ir" => array(23, 84, 135), "pt" => array(208, 208, 224), "au" => array(255, 209, 35), "hg" => array(184, 184, 208), "tl" => array(166, 84, 77), "pb" => array(87, 89, 97), "bi" => array(158, 79, 181), "po" => array(171, 92, 0), "at" => array(117, 79, 69), "rn" => array(66, 130, 150), "fr" => array(66, 0, 102), "ra" => array(0, 125, 0), "ac" => array(112, 171, 250), "th" => array(0, 186, 255), "pa" => array(0, 161, 255), "u" => array(0, 143, 255), "np" => array(0, 128, 255), "pu" => array(0, 107, 255), "am" => array(84, 92, 242), "cm" => array(120, 92, 227), "bk" => array(138, 79, 227), "cf" => array(161, 54, 212), "es" => array(179, 31, 212), "fm" => array(179, 31, 186), "md" => array(179, 13, 166), "no" => array(189, 13, 135), "lr" => array(199, 0, 102), "rf" => array(204, 0, 89), "db" => array(209, 0, 79), "sg" => array(217, 0, 69), "bh" => array(224, 0, 56), "hs" => array(230, 0, 46), "mt" => array(235, 0, 38), "ds" => array(235, 0, 38), "rg" => array(235, 0, 38), "cn" => array(235, 0, 38), "uut" => array(235, 0, 38), "uuq" => array(235, 0, 38), "uup" => array(235, 0, 38), "uuh" => array(235, 0, 38), "uus" => array(235, 0, 38), "uuo" => array(235, 0, 38));
    
    
    public function __makeAtomMatAndItsMeta ($r, $g, $b, $mat_meta_id){ // in zero to 1 domain
    
$_materialPattern =
"%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!21 &2100000
Material:
  serializedVersion: 6
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 0}
  m_Name: Natrium_transp
  m_Shader: {fileID: 31, guid: 0000000000000000f000000000000000, type: 0}
  m_ShaderKeywords: _ALPHAPREMULTIPLY_ON
  m_LightmapFlags: 4
  m_EnableInstancingVariants: 0
  m_DoubleSidedGI: 0
  m_CustomRenderQueue: -1
  stringTagMap: {}
  disabledShaderPasses: []
  m_SavedProperties:
    serializedVersion: 3
    m_TexEnvs:
    - _BumpMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _DetailAlbedoMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _DetailMask:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _DetailNormalMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _EmissionMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _MainTex:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _MetallicGlossMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _OcclusionMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _ParallaxMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    - _SpecGlossMap:
        m_Texture: {fileID: 0}
        m_Scale: {x: 1, y: 1}
        m_Offset: {x: 0, y: 0}
    m_Floats:
    - _BumpScale: 1
    - _Cutoff: 0.5
    - _DetailNormalMapScale: 1
    - _DstBlend: 10
    - _GlossMapScale: 1
    - _Glossiness: 0.4
    - _GlossyReflections: 1
    - _Metallic: 0
    - _Mode: 3
    - _OcclusionStrength: 1
    - _Parallax: 0.02
    - _Shininess: 0.5
    - _SmoothnessTextureChannel: 0
    - _SpecularHighlights: 1
    - _SrcBlend: 1
    - _UVSec: 0
    - _ZWrite: 0
    m_Colors:
    - _Color: {r: ". ($r/255). ", g: ". ($g/255) .", b: ". ($b/255) .", a: 1}
    - _EmissionColor: {r: 0, g: 0, b: 0, a: 1}
    - _SpecColor: {r: 0.5, g: 0.5, b: 0.5, a: 0}
";


$patternAtomMatMeta =
"fileFormatVersion: 2
guid: " . $mat_meta_id . "
timeCreated: 1507294884
licenseType: Free
NativeFormatImporter:
  mainObjectFileID: 2100000
  userData:
  assetBundleName:
  assetBundleVariant:
";

return [$_materialPattern, $patternAtomMatMeta];
    }

    
    public function __getAnAtom(){

return "
% ATOM
--- !u!1 &___[atom_go]___
GameObject:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[atom_transform]___}                 // inter
  - component: {fileID: ___[atom_mesh]___}
  - component: {fileID: ___[atom_mesh_renderer]___}
  - component: {fileID: ___[atom_script]___}
  - component: {fileID: ___[atom_collider]___}
  m_Layer: 0
  m_Name: Chloride_transp
  m_TagString: chloride
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
  
% POSITION OF ATOM
--- !u!4 &___[atom_transform]___                                    // inter
Transform:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[atom_go]___}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: ___[atom_position_x]___, y: ___[atom_position_y]___, z: ___[atom_position_z]___}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children: []
  m_Father: {fileID: ___[molecule_transform]___}                        //inter
  m_RootOrder: 2
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}

% MESH RENDERER OF ATOM
--- !u!23 &___[atom_mesh_renderer]___
MeshRenderer:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[atom_go]___}
  m_Enabled: 1
  m_CastShadows: 1
  m_ReceiveShadows: 1
  m_DynamicOccludee: 1
  m_MotionVectors: 1
  m_LightProbeUsage: 1
  m_ReflectionProbeUsage: 1
  m_Materials:
  - {fileID: 2100000, guid: ___[atom_material_guid]___, type: 2}
  m_StaticBatchInfo:
    firstSubMesh: 0
    subMeshCount: 0
  m_StaticBatchRoot: {fileID: 0}
  m_ProbeAnchor: {fileID: 0}
  m_LightProbeVolumeOverride: {fileID: 0}
  m_ScaleInLightmap: 1
  m_PreserveUVs: 1
  m_IgnoreNormalsForChartDetection: 0
  m_ImportantGI: 0
  m_StitchLightmapSeams: 0
  m_SelectedEditorRenderState: 3
  m_MinimumChartSize: 4
  m_AutoUVMaxDistance: 0.5
  m_AutoUVMaxAngle: 89
  m_LightmapParameters: {fileID: 0}
  m_SortingLayerID: 0
  m_SortingLayer: 0
  m_SortingOrder: 0
  
% MESH FILTER (SPHERE)
--- !u!33 &___[atom_mesh]___
MeshFilter:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[atom_go]___}
  m_Mesh: {fileID: 10207, guid: 0000000000000000e000000000000000, type: 0}
  
  
% BOX COLLIDER
--- !u!65 &___[atom_collider]___
BoxCollider:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[atom_go]___}
  m_Material: {fileID: 0}
  m_IsTrigger: 1
  m_Enabled: 1
  serializedVersion: 2
  m_Size: {x: 1, y: 1, z: 1}
  m_Center: {x: 0, y: 0, z: 0}
  
% ATOM SCRIPT
--- !u!114 &___[atom_script]___
MonoBehaviour:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[atom_go]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: 32d9a756212078f4f95179bc563ee98c, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  placed: 0
  loopCheck: 0
";
    

    }
    
public function _getABond(){



return "
% BOND
% Game Object
--- !u!1 &___[bond_go]___
GameObject:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[bond_transform]___}              // inter
  - component: {fileID: ___[bond_cylinder]___}
  - component: {fileID: ___[bond_renderer]___}
  m_Layer: 0
  m_Name: bond
  m_TagString: Bond
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1
  
  
% POSITION
--- !u!4 &___[bond_transform]___
Transform:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[bond_go]___}
  m_LocalRotation: {x: ___[bond_rotation_x]___, y: ___[bond_rotation_y]___, z: ___[bond_rotation_z]___, w: ___[bond_rotation_w]___}
  m_LocalPosition: {x: ___[bond_position_x]___, y: ___[bond_position_y]___, z: ___[bond_position_z]___}
  m_LocalScale: {x: ___[bond_scale_x]___, y: ___[bond_scale_y]___, z: ___[bond_scale_z]___}
  m_Children: []
  m_Father: {fileID: ___[molecule_transform]___}                          // Inteconnection with molecule
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: -90}
  
  
% MESH RENDERER
--- !u!23 &___[bond_renderer]___
MeshRenderer:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[bond_go]___}
  m_Enabled: 1
  m_CastShadows: 1
  m_ReceiveShadows: 1
  m_DynamicOccludee: 1
  m_MotionVectors: 1
  m_LightProbeUsage: 1
  m_ReflectionProbeUsage: 1
  m_Materials:
  - {fileID: 10303, guid: 0000000000000000f000000000000000, type: 0}
  m_StaticBatchInfo:
    firstSubMesh: 0
    subMeshCount: 0
  m_StaticBatchRoot: {fileID: 0}
  m_ProbeAnchor: {fileID: 0}
  m_LightProbeVolumeOverride: {fileID: 0}
  m_ScaleInLightmap: 1
  m_PreserveUVs: 1
  m_IgnoreNormalsForChartDetection: 0
  m_ImportantGI: 0
  m_StitchLightmapSeams: 0
  m_SelectedEditorRenderState: 3
  m_MinimumChartSize: 4
  m_AutoUVMaxDistance: 0.5
  m_AutoUVMaxAngle: 89
  m_LightmapParameters: {fileID: 0}
  m_SortingLayerID: 0
  m_SortingLayer: 0
  m_SortingOrder: 0
  
  
% MESH FILTER (CYLINDER)
--- !u!33 &___[bond_cylinder]___
MeshFilter:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[bond_go]___}
  m_Mesh: {fileID: 10206, guid: 0000000000000000e000000000000000, type: 0}
";

}
    
    
    public function __getAnEmptyMolecule(){
        
        return
"
% EMPTY MOLECULE
%YAML 1.1
%TAG !u! tag:unity3d.com,2011:
--- !u!1001 &100100000
Prefab:
  m_ObjectHideFlags: 1
  serializedVersion: 2
  m_Modification:
    m_TransformParent: {fileID: 0}
    m_Modifications: []
    m_RemovedComponents: []
  m_ParentPrefab: {fileID: 0}
  m_RootGameObject: {fileID: ___[molecule_root_go]___}
  m_IsPrefabParent: 1

% The ROOT GO
--- !u!1 &___[molecule_root_go]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[molecule_root_transform]___}
  m_Layer: 0
  m_Name: ___[molecule_name]___
  m_TagString: Molecule
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1

% POSITION OF THE ROOT GO
--- !u!4 &___[molecule_root_transform]___
Transform:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[molecule_root_go]___}
  m_LocalRotation: {x: 0, y: 0, z: 0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 2, y: 2, z: 2}
  m_Children:
  - {fileID: ___[molecule_transform]___}
  m_Father: {fileID: 0}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
  
% MOLECULE
--- !u!1 &___[molecule_go]___
GameObject:
  m_ObjectHideFlags: 0
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  serializedVersion: 5
  m_Component:
  - component: {fileID: ___[molecule_transform]___}               // This is the interconnection with the atoms and bonds
  - component: {fileID: ___[molecule_script_1]___}
  - component: {fileID: ___[molecule_script_2]___}
  m_Layer: 0
  m_Name: ___[molecule_name]___
  m_TagString: Untagged
  m_Icon: {fileID: 0}
  m_NavMeshLayer: 0
  m_StaticEditorFlags: 0
  m_IsActive: 1

% MOLECULE POSITION
--- !u!4 &___[molecule_transform]___
Transform:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[molecule_go]___}
  m_LocalRotation: {x: -0, y: -0, z: -0, w: 1}
  m_LocalPosition: {x: 0, y: 0, z: 0}
  m_LocalScale: {x: 1, y: 1, z: 1}
  m_Children:
  - {fileID: ___[bond_transform]___}                     // Interconnection with Bond
  - {fileID: ___[atom_transform]___}                      // Interconnection with Atom (Chloride)
  - {fileID: ___[atom_transform]___}                      // Interconnection with Atom (Natrium)
  m_Father: {fileID: ___[molecule_root_transform]___}
  m_RootOrder: 0
  m_LocalEulerAnglesHint: {x: 0, y: 0, z: 0}
% MOLECULE SCRIPT 1
--- !u!114 &___[molecule_script_1]___
MonoBehaviour:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[molecule_go]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: b781c3734fe48f9458ba43f591a454a9, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  placedElements: []
% MOLECULE SCRIPT 2
--- !u!114 &___[molecule_script_2]___
MonoBehaviour:
  m_ObjectHideFlags: 1
  m_PrefabParentObject: {fileID: 0}
  m_PrefabInternal: {fileID: 100100000}
  m_GameObject: {fileID: ___[molecule_go]___}
  m_Enabled: 1
  m_EditorHideFlags: 0
  m_Script: {fileID: 11500000, guid: fdb46f4bdae46654484a63153b2637c6, type: 3}
  m_Name:
  m_EditorClassIdentifier:
  rotSpeed: 200
  isRotating: 0
";

    }
    
    
    public function makeMolMetaYAML($molecule_guid){

        return "
fileFormatVersion: 2
guid: " . $molecule_guid . "
timeCreated: 1518438685
licenseType: Free
NativeFormatImporter:
  externalObjects: {}
  mainObjectFileID: 100100000
  userData:
  assetBundleName:
  assetBundleVariant:
";

    }
    
    
    public function __construct($content){
        $this->_content = $content;
    }

    public function trim($text) {
        return preg_replace('/\s\s*$/', '', preg_replace('/^\s\s*/', '', $text, 1), 1);
    }
    
    public function capitalize($text) {
        
        $res = strtoupper($text[0]);
        
        if(strlen($text)>1)
            $res .= strtolower(substr($text,1));
        
        return $res;
    }
    
    public function hash($s, $e) {
       
        return 's' . min($s, $e) . 'e' . max($s, $e);
    }
    
    public function buildGeometry($atoms, $bonds) {
    
        $i = null;
        $l = null;
        $verticesAtoms = array();
        $colorsAtoms = array();
        $verticesBonds = array();
    
        for ($i = 0, $l = count($atoms);$i < $l;$i++) {
    
            $atom = $atoms[$i];
            $x = $atom[0];
            $y = $atom[1];
            $z = $atom[2];
    
            array_push($verticesAtoms, $x, $y, $z);
    
            $r = $atom[ 3 ][ 0 ] / 255;
            $g = $atom[ 3 ][ 1 ] / 255;
            $b = $atom[ 3 ][ 1 ] / 255;
    
            array_push($colorsAtoms, $r, $g, $b);
        }
    
        
        for ($i = 0, $l = count($bonds);$i < $l;$i++) {
            $bond = $bonds[$i];
            
            $start = $bond[ 0 ];
            $end = $bond[ 1 ];
    
            array_push($verticesBonds,
                $verticesAtoms[$start*3], $verticesAtoms[$start*3 + 1], $verticesAtoms[$start*3 + 2],
                $verticesAtoms[$end*3], $verticesAtoms[$end*3 + 1], $verticesAtoms[$end*3 + 2]);
        }


        $build = array(
                            "atoms" => $atoms,
                            "bonds" => $bonds,
                            "verticesAtoms"=>$verticesAtoms,
                            "colorsAtoms" => $colorsAtoms,
                            "verticesBonds"=>$verticesBonds
        );

        return $build;
    }
    
    
    
    public function parser(){
    
        $atoms = array();
        $bonds = array();
        $histogram = array();
        $bhash = array();
        $x = null;
        $y = null;
        $z = null;
        $e = null;
        
        $lines = explode('\n', $this->_content);
       
        
        for ($i = 0; $i < count($lines); $i++) {
            
            if (substr($lines[$i], 0, 4) === 'ATOM' || substr($lines[$i], 0, 6) === 'HETATM') {
    
                $x = floatval(substr($lines[$i], 30, 7));
                $y = floatval(substr($lines[$i], 38, 7));
                $z = floatval(substr($lines[$i], 46, 7));
    
                $e = strtolower($this->trim(substr($lines[$i], 76, 2)));
                
                if ($e === '') {
                    $e = strtolower($this->trim(substr($lines[$i], 12, 2)));
                }

                

                array_push($atoms, array($x, $y, $z, $this->CPK[$e], $this->capitalize($e)));

                //array_push($atoms, array($this->capitalize($e), $x, $y, $z, $mat_meta[0], $mat_meta[1] ));

                if (!isset($histogram[$e])) {
                    $histogram[$e] = 1;
                } else {
                    $histogram[$e] += 1;
                }

            } else if (substr($lines[$i], 0, 6) === 'CONECT') {

                $satom = intval(substr($lines[$i], 6, 5));
                $eatom = intval(substr($lines[$i], 11, 5));

                if ($eatom) {

                    $h = $this->hash($satom, $eatom);

                    if (!isset($bhash[$h])) {

                        array_push($bonds, array($satom - 1, $eatom - 1, 1));

                        $bhash[$h] = count($bonds) - 1;

                    } else {

                    }
                }

            }
        
        }

        return $this->buildGeometry($atoms, $bonds);
    }

    
    function makeAnFid($seed){
    
        return str_pad($seed , 16, "0", STR_PAD_LEFT);
    }
    
}

$dirFormAtomMaterials = "Materials";

$str= "HEADER    water".'\n'.
"COMPND".'\n'.
"TITLE".'\n'.
"SOURCE".'\n'.
"HETATM    1  H   HOH     1       9.626   6.787  12.673".'\n'.
"HETATM    2  H   HOH     1       9.626   8.420  12.673".'\n'.
"HETATM    3  O   HOH     1      10.203   7.604  12.673".'\n'.
"CONECT    1    3".'\n'.
"CONECT    2    3".'\n'.
"END";


$pdbloader = new PDBLoader($str);

$mol = $pdbloader->parser();

//$jsonMol =  json_encode($mol, JSON_PRETTY_PRINT);

$atoms = $mol['atoms'];


// ====================================== Make the materials for each atom ============================
for ($i=0 ; $i<count($atoms); $i++){
    
    $atomSymbol = $atoms[$i][4];
    
    $atomName = $pdbloader->atomNames[strtolower($atomSymbol)];
    
    $red = $atoms[$i][3][0];
    $green = $atoms[$i][3][1];
    $blue = $atoms[$i][3][2];
    
    // The meta id consists of 32 chars 0 .. 0 a Red b Green c Blue
    $mat_meta_id = str_pad("a".$red."b".$green."c".$blue, 32, "0", STR_PAD_LEFT );

    // get the colors to make the mat and its meta
    $mat_meta = $pdbloader->__makeAtomMatAndItsMeta (  $red, $green, $blue, $mat_meta_id );

    if(!is_dir($dirFormAtomMaterials))
        mkdir($dirFormAtomMaterials);

    $fh = fopen( $dirFormAtomMaterials .DIRECTORY_SEPARATOR. $atomName . "_transp.mat", "w");
    fwrite($fh, $mat_meta[0]);
    fclose($fh);

    $fh = fopen($dirFormAtomMaterials .DIRECTORY_SEPARATOR. $atomName . "_transp.mat.meta", "w");
    fwrite($fh, $mat_meta[1]);
    fclose($fh);
}



// ========  Make the Molecules 3D YAMLs =============

// Make the dir for the prefabs
$dirForMoleculePrefabs = "Prefabs";

if(!is_dir($dirForMoleculePrefabs))
    mkdir($dirForMoleculePrefabs);

//----------------------
$post_id = "123";
$molecule_name = "water";
$molecule_formula = "H20";

$mol_guid_pad = "542";     // my fixed suffix for the guid of the molecules



$molecule_guid = str_pad($post_id.$mol_guid_pad , 32, "0", STR_PAD_LEFT);

//---------------------

$fg = fopen($dirForMoleculePrefabs . DIRECTORY_SEPARATOR . $molecule_name . ".prefab","w");


$mol_fid_pad = "5";

// Empty mol vars
$mol = $pdbloader->__getAnEmptyMolecule();
fwrite($fg, $mol);

$molecule_root_go        = $pdbloader->makeAnFid($post_id.$mol_guid_pad.$mol_fid_pad."1");
$molecule_go             = $pdbloader->makeAnFid($post_id.$mol_guid_pad.$mol_fid_pad."2");
$molecule_root_transform = "";
$molecule_transform = "";  // inter
$molecule_script_1 = "";
$molecule_script_2 = "";
$bond_transform = "";   // inter
$atom_transform = "";   // inter


//
//// atom vars
//$atom_go = "";
//$atom_transform = ""; // inter
//$atom_mesh = "";
//$atom_mesh_renderer = "";
//$atom_script = "";
//$atom_collider = "";
//$atom_position_x = "";
//$atom_position_y = "";
//$atom_position_z = "";
//$molecule_transform = ""; // inter
//$atom_material_guid = "";
//
//// bond vars
//$bond_go = "";
//$bond_transform = ""; // inter
//$bond_cylinder = "";
//$bond_renderer = "";
    //$bond_rotation_x = "";
    //$bond_rotation_y = "";
    //$bond_rotation_z = "";
    //$bond_position_x = "";
    //$bond_position_y = "";
    //$bond_position_z = "";
    //$bond_scale_x = "";
    //$bond_scale_y = "";
    //$bond_scale_z = "";
//$molecule_transform = ""; // inter


fclose($fg);



// Save also the meta of the prefab
$fh = fopen($dirForMoleculePrefabs.DIRECTORY_SEPARATOR.$molecule_name.".prefab.meta", "w" );
fwrite($fh, $pdbloader->makeMolMetaYAML($molecule_guid));
fclose($fh);




