<?php
    function fullStudiesAPI($results)
    {
        $x = 0;
        //create array with data
        foreach($results as $result)
        {
            $array[$x]['Rank'] = $result['Rank'];
            $array[$x]['NCTId'] = $result['Study']['ProtocolSection']['IdentificationModule']['NCTId'];
            $array[$x]['OrgStudyId'] = $result['Study']['ProtocolSection']['IdentificationModule']['OrgStudyIdInfo']['OrgStudyId'];
            $array[$x]['OrgFullName'] = $result['Study']['ProtocolSection']['IdentificationModule']['Organization']['OrgFullName'];
            $array[$x]['OrgClass'] = $result['Study']['ProtocolSection']['IdentificationModule']['Organization']['OrgClass'];
            $array[$x]['OfficialTitle'] = $result['Study']['ProtocolSection']['IdentificationModule']['OfficialTitle'];
            $array[$x]['StatusVerifiedDate'] = $result['Study']['ProtocolSection']['StatusModule']['StatusVerifiedDate'];
            $array[$x]['OverallStatus'] = $result['Study']['ProtocolSection']['StatusModule']['OverallStatus'];
            $array[$x]['StartDate'] = $result['Study']['ProtocolSection']['StatusModule']['StartDateStruct']['StartDate'];
            $array[$x]['StartDateType'] = $result['Study']['ProtocolSection']['StatusModule']['StartDateStruct']['StartDateType'];
            $array[$x]['PrimaryCompletionDate'] = $result['Study']['ProtocolSection']['StatusModule']['PrimaryCompletionDateStruct']['PrimaryCompletionDate'];
            $array[$x]['PrimaryCompletionDateType'] = $result['Study']['ProtocolSection']['StatusModule']['PrimaryCompletionDateStruct']['PrimaryCompletionDateType'];
            $array[$x]['CompletionDate'] = $result['Study']['ProtocolSection']['StatusModule']['CompletionDateStruct']['CompletionDate'];
            $array[$x]['CompletionDateType'] = $result['Study']['ProtocolSection']['StatusModule']['CompletionDateStruct']['CompletionDateType'];
            $array[$x]['StudyFirstSubmitDate'] = $result['Study']['ProtocolSection']['StatusModule']['StudyFirstSubmitDate'];
            $array[$x]['LastUpdateSubmitDate'] = $result['Study']['ProtocolSection']['StatusModule']['LastUpdateSubmitDate'];
            $array[$x]['ResponsiblePartyType'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['ResponsibleParty']['ResponsiblePartyType'];
            $array[$x]['ResponsiblePartyInvestigatorFullName'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['ResponsibleParty']['ResponsiblePartyInvestigatorFullName'];
            $array[$x]['ResponsiblePartyInvestigatorTitle'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['ResponsibleParty']['ResponsiblePartyInvestigatorTitle'];
            $array[$x]['ResponsiblePartyInvestigatorAffiliation'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['ResponsibleParty']['ResponsiblePartyInvestigatorAffiliation'];
            $array[$x]['LeadSponsorName'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['LeadSponsor']['LeadSponsorName'];
            $array[$x]['LeadSponsorClass'] = $result['Study']['ProtocolSection']['SponsorCollaboratorsModule']['LeadSponsor']['LeadSponsorClass'];
            $array[$x]['OversightHasDMC'] = $result['Study']['ProtocolSection']['OversightModule']['OversightHasDMC'];
            $array[$x]['IsFDARegulatedDrug'] = $result['Study']['ProtocolSection']['OversightModule']['IsFDARegulatedDrug'];
            $array[$x]['IsFDARegulatedDevice'] = $result['Study']['ProtocolSection']['OversightModule']['IsFDARegulatedDevice'];
            $array[$x]['BriefSummary'] = $result['Study']['ProtocolSection']['DescriptionModule']['BriefSummary'];
            $array[$x]['DetailedDescription'] = $result['Study']['ProtocolSection']['DescriptionModule']['DetailedDescription'];
            
            //Array loop?
            $array[$x]['Condition'] = $result['Study']['ProtocolSection']['ConditionsModule']['ConditionList']['Condition'];

            $array[$x]['DesignAllocation'] = $result['Study']['ProtocolSection']['DesignModule']['DesignInfo']['DesignAllocation'];
            $array[$x]['DesignInterventionModel'] = $result['Study']['ProtocolSection']['DesignModule']['DesignInfo']['DesignInterventionModel'];
            $array[$x]['DesignInterventionModelDescription'] = $result['Study']['ProtocolSection']['DesignModule']['DesignInfo']['DesignInterventionModelDescription'];
            $array[$x]['DesignPrimaryPurpose'] = $result['Study']['ProtocolSection']['DesignModule']['DesignInfo']['DesignPrimaryPurpose'];
            $array[$x]['DesignMasking'] = $result['Study']['ProtocolSection']['DesignModule']['DesignInfo']['DesignMaskingInfo']['DesignMasking'];
            $array[$x]['EnrollmentCount'] = $result['Study']['ProtocolSection']['DesignModule']['EnrollmentInfo']['EnrollmentCount'];
            $array[$x]['EnrollmentType'] = $result['Study']['ProtocolSection']['DesignModule']['EnrollmentInfo']['EnrollmentType'];


            $x++;
        }

        return $array;
    }

/*
    "FullStudies":[
      {
        "Rank":1,
        "Study":{
          "ProtocolSection":{
            "ConditionsModule":{
              "ConditionList":{
                "Condition":[
                  "Major Depressive Disorder",
                  "Depression"
                ]
              }
            },
            
            "DescriptionModule":{
              "BriefSummary":"The goal of this fixed order, open-label, dose-escalation study is to investigate the safety and efficacy of specific doses of dimethyltryptamine (DMT) in humans.",
              "DetailedDescription":"The results of this study will inform the doses to be used in a larger, double-blind, randomized, placebo-controlled, crossover study. Since the goal of the open label study is to inform the double-blind, randomized, placebo-controlled study, the investigators are citing the hypothesis of the latter solely for providing context. The investigators hypothesize that the administration of DMT will result in neuroplastic changes in healthy and depressed subjects. These changes in neuroplasticity will be indexed using electroencephalographic (EEG) measures and tasks. These neuronal changes may in parallel cause changes in mood measured both in healthy and depressed subjects, which will be captured using appropriate psychometric measures of mood."
            },            
            "DesignModule":{
              "StudyType":"Interventional",
              "PhaseList":{
                "Phase":[
                  "Phase 1"
                ]
              },
              "DesignInfo":{
                "DesignAllocation":"Non-Randomized",
                "DesignInterventionModel":"Crossover Assignment",
                "DesignInterventionModelDescription":"Healthy individuals and patients with major depressive disorder will participate in this study. Subjects will receive 0.1 mg/kg and 0.3 mg/kg DMT in a fixed order across 2 test days.",
                "DesignPrimaryPurpose":"Other",
                "DesignMaskingInfo":{
                  "DesignMasking":"None (Open Label)"
                }
              },
              "EnrollmentInfo":{
                "EnrollmentCount":"30",
                "EnrollmentType":"Anticipated"
              }
            },
            "ArmsInterventionsModule":{
              "ArmGroupList":{
                "ArmGroup":[
                  {
                    "ArmGroupLabel":"0.1 mg/kg DMT",
                    "ArmGroupType":"Active Comparator",
                    "ArmGroupDescription":"0.1 mg/kg DMT administered intravenously",
                    "ArmGroupInterventionList":{
                      "ArmGroupInterventionName":[
                        "Drug: 0.1 mg/kg Dimethyltryptamine (DMT)"
                      ]
                    }
                  },{
                    "ArmGroupLabel":"0.3 mg/kg DMT",
                    "ArmGroupType":"Active Comparator",
                    "ArmGroupDescription":"0.3 mg/kg DMT administered intravenously",
                    "ArmGroupInterventionList":{
                      "ArmGroupInterventionName":[
                        "Drug: 0.3 mg/kg Dimethyltryptamine (DMT)"
                      ]
                    }
                  }
                ]
              },
              "InterventionList":{
                "Intervention":[
                  {
                    "InterventionType":"Drug",
                    "InterventionName":"0.1 mg/kg Dimethyltryptamine (DMT)",
                    "InterventionDescription":"0.1 mg/kg DMT",
                    "InterventionArmGroupLabelList":{
                      "InterventionArmGroupLabel":[
                        "0.1 mg/kg DMT"
                      ]
                    },
                    "InterventionOtherNameList":{
                      "InterventionOtherName":[
                        "Low Dose DMT"
                      ]
                    }
                  },{
                    "InterventionType":"Drug",
                    "InterventionName":"0.3 mg/kg Dimethyltryptamine (DMT)",
                    "InterventionDescription":"0.3 mg/kg DMT",
                    "InterventionArmGroupLabelList":{
                      "InterventionArmGroupLabel":[
                        "0.3 mg/kg DMT"
                      ]
                    },
                    "InterventionOtherNameList":{
                      "InterventionOtherName":[
                        "Moderate Dose DMT"
                      ]
                    }
                  }
                ]
              }
            },
            "OutcomesModule":{
              "PrimaryOutcomeList":{
                "PrimaryOutcome":[
                  {
                    "PrimaryOutcomeMeasure":"Change in Blood Pressure",
                    "PrimaryOutcomeDescription":"Systolic and diastolic blood pressure will be measured before and several times after the administration of DMT on each test day.",
                    "PrimaryOutcomeTimeFrame":"-60 and -30 minutes before DMT administration; 0, +5, +10, +15, +20, +30, +45, +60, and +120 minutes after DMT administration"
                  },{
                    "PrimaryOutcomeMeasure":"Change in Heart Rate",
                    "PrimaryOutcomeDescription":"Heart rate will be measured before and several times after the administration of DMT on each test day.",
                    "PrimaryOutcomeTimeFrame":"-60 and -30 minutes before DMT administration; 0, +5, +10, +15, +20, +30, +45, +60, and +120 minutes after DMT administration"
                  },{
                    "PrimaryOutcomeMeasure":"Change in Psychedelic Effects",
                    "PrimaryOutcomeDescription":"The modified Altered States of Consciousness Rating Scale (ASC) will be used to assess drug-induced altered states of consciousness before and several times after drug administration. This is a 23-item subjective rating scale that will be completed using a visual analog scale format. Questions are scored 0 to 100 each; higher numbers indicate greater psychedelic effects.",
                    "PrimaryOutcomeTimeFrame":"-60 minutes before DMT administration; 0, +30, and +60 minutes after DMT administration"
                  },{
                    "PrimaryOutcomeMeasure":"Change in Anxiety",
                    "PrimaryOutcomeDescription":"Anxiety will be assessed using a visual analog scale that subjects will be asked to score from 0 (not at all) to 100 (worst ever) to capture the net anxiety produced by DMT. This will be collected before and several times after DMT administration.",
                    "PrimaryOutcomeTimeFrame":"-60 minutes before DMT administration; 0, +30, and +60 minutes after DMT administration"
                  },{
                    "PrimaryOutcomeMeasure":"Drug Reinforcing Effects",
                    "PrimaryOutcomeDescription":"Subjects will be asked to answer questions such as (1) How likely are you to use this drug? and (2) How much are you willing to pay for this experience? using a visual analog scale.",
                    "PrimaryOutcomeTimeFrame":"+120 minutes after DMT administration"
                  },{
                    "PrimaryOutcomeMeasure":"Overall Tolerability assessed by the VAS",
                    "PrimaryOutcomeDescription":"Overall tolerability will be assessed using a visual analog scale that subjects will be asked to score from 0 (well tolerated) to 100 (intolerable) to capture the net tolerability of DMT.",
                    "PrimaryOutcomeTimeFrame":"+120 minutes after DMT administration"
                  }
                ]
              }
            },
            "EligibilityModule":{
              "EligibilityCriteria":"Healthy controls inclusion criteria:\n\nMedically healthy\nPsychiatrically healthy\n\nHealthy controls exclusion criteria:\n\nUnstable medical conditions\nPsychiatric illness\n\nDepression inclusion criteria:\n\nMedically healthy\nDiagnosis of major depressive disorder\n\nDepression exclusion criteria:\n\n-Unstable medical conditions",
              "HealthyVolunteers":"Accepts Healthy Volunteers",
              "Gender":"All",
              "MinimumAge":"21 Years",
              "MaximumAge":"65 Years",
              "StdAgeList":{
                "StdAge":[
                  "Adult",
                  "Older Adult"
                ]
              }
            },
            "ContactsLocationsModule":{
              "LocationList":{
                "Location":[
                  {
                    "LocationFacility":"Biological Studies Unit at the VA Connecticut Healthcare System, Yale School of Medicine",
                    "LocationCity":"West Haven",
                    "LocationState":"Connecticut",
                    "LocationZip":"06516",
                    "LocationCountry":"United States"
                  }
                ]
              }
            }
          },
          "DerivedSection":{
            "MiscInfoModule":{
              "VersionHolder":"April 25, 2022"
            },
            "ConditionBrowseModule":{
              "ConditionMeshList":{
                "ConditionMesh":[
                  {
                    "ConditionMeshId":"D000003866",
                    "ConditionMeshTerm":"Depressive Disorder"
                  },{
                    "ConditionMeshId":"D000003865",
                    "ConditionMeshTerm":"Depressive Disorder, Major"
                  }
                ]
              },
              "ConditionAncestorList":{
                "ConditionAncestor":[
                  {
                    "ConditionAncestorId":"D000019964",
                    "ConditionAncestorTerm":"Mood Disorders"
                  },{
                    "ConditionAncestorId":"D000001523",
                    "ConditionAncestorTerm":"Mental Disorders"
                  }
                ]
              },
              "ConditionBrowseLeafList":{
                "ConditionBrowseLeaf":[
                  {
                    "ConditionBrowseLeafId":"M6210",
                    "ConditionBrowseLeafName":"Depression",
                    "ConditionBrowseLeafRelevance":"low"
                  },{
                    "ConditionBrowseLeafId":"M6213",
                    "ConditionBrowseLeafName":"Depressive Disorder",
                    "ConditionBrowseLeafAsFound":"Depressive Disorder",
                    "ConditionBrowseLeafRelevance":"high"
                  },{
                    "ConditionBrowseLeafId":"M6212",
                    "ConditionBrowseLeafName":"Depressive Disorder, Major",
                    "ConditionBrowseLeafAsFound":"Major Depressive Disorder",
                    "ConditionBrowseLeafRelevance":"high"
                  },{
                    "ConditionBrowseLeafId":"M20988",
                    "ConditionBrowseLeafName":"Mood Disorders",
                    "ConditionBrowseLeafRelevance":"low"
                  },{
                    "ConditionBrowseLeafId":"M13625",
                    "ConditionBrowseLeafName":"Psychotic Disorders",
                    "ConditionBrowseLeafRelevance":"low"
                  },{
                    "ConditionBrowseLeafId":"M3967",
                    "ConditionBrowseLeafName":"Mental Disorders",
                    "ConditionBrowseLeafRelevance":"low"
                  }
                ]
              },
              "ConditionBrowseBranchList":{
                "ConditionBrowseBranch":[
                  {
                    "ConditionBrowseBranchAbbrev":"BXM",
                    "ConditionBrowseBranchName":"Behaviors and Mental Disorders"
                  },{
                    "ConditionBrowseBranchAbbrev":"All",
                    "ConditionBrowseBranchName":"All Conditions"
                  }
                ]
              }
            },
            "InterventionBrowseModule":{
              "InterventionMeshList":{
                "InterventionMesh":[
                  {
                    "InterventionMeshId":"D000004130",
                    "InterventionMeshTerm":"N,N-Dimethyltryptamine"
                  }
                ]
              },
              "InterventionAncestorList":{
                "InterventionAncestor":[
                  {
                    "InterventionAncestorId":"D000006213",
                    "InterventionAncestorTerm":"Hallucinogens"
                  },{
                    "InterventionAncestorId":"D000045505",
                    "InterventionAncestorTerm":"Physiological Effects of Drugs"
                  },{
                    "InterventionAncestorId":"D000011619",
                    "InterventionAncestorTerm":"Psychotropic Drugs"
                  },{
                    "InterventionAncestorId":"D000012702",
                    "InterventionAncestorTerm":"Serotonin Antagonists"
                  },{
                    "InterventionAncestorId":"D000018490",
                    "InterventionAncestorTerm":"Serotonin Agents"
                  },{
                    "InterventionAncestorId":"D000018377",
                    "InterventionAncestorTerm":"Neurotransmitter Agents"
                  },{
                    "InterventionAncestorId":"D000045504",
                    "InterventionAncestorTerm":"Molecular Mechanisms of Pharmacological Action"
                  },{
                    "InterventionAncestorId":"D000017366",
                    "InterventionAncestorTerm":"Serotonin Receptor Agonists"
                  }
                ]
              },
              "InterventionBrowseLeafList":{
                "InterventionBrowseLeaf":[
                  {
                    "InterventionBrowseLeafId":"M6466",
                    "InterventionBrowseLeafName":"N,N-Dimethyltryptamine",
                    "InterventionBrowseLeafAsFound":"YH4808",
                    "InterventionBrowseLeafRelevance":"high"
                  },{
                    "InterventionBrowseLeafId":"M8457",
                    "InterventionBrowseLeafName":"Hallucinogens",
                    "InterventionBrowseLeafRelevance":"low"
                  },{
                    "InterventionBrowseLeafId":"M13626",
                    "InterventionBrowseLeafName":"Psychotropic Drugs",
                    "InterventionBrowseLeafRelevance":"low"
                  },{
                    "InterventionBrowseLeafId":"M14664",
                    "InterventionBrowseLeafName":"Serotonin",
                    "InterventionBrowseLeafRelevance":"low"
                  },{
                    "InterventionBrowseLeafId":"M19657",
                    "InterventionBrowseLeafName":"Neurotransmitter Agents",
                    "InterventionBrowseLeafRelevance":"low"
                  },{
                    "InterventionBrowseLeafId":"M18800",
                    "InterventionBrowseLeafName":"Serotonin Receptor Agonists",
                    "InterventionBrowseLeafRelevance":"low"
                  }
                ]
              },
              "InterventionBrowseBranchList":{
                "InterventionBrowseBranch":[
                  {
                    "InterventionBrowseBranchAbbrev":"PsychDr",
                    "InterventionBrowseBranchName":"Psychotropic Drugs"
                  },{
                    "InterventionBrowseBranchAbbrev":"All",
                    "InterventionBrowseBranchName":"All Drugs and Chemicals"
                  }
                ]
              }
            }
          }
        }
      },
*/
?>