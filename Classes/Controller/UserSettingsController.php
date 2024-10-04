<?php

namespace Passionweb\CustomUserSettings\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Module\ModuleData;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class UserSettingsController extends ActionController {

    protected ?ModuleData $moduleData;
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected ModuleTemplateFactory $moduleTemplateFactory
    ) {
    }

    public function initializeAction(): void
    {
        $this->moduleData = $this->request->getAttribute('moduleData');
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle('Custom User Settings Backend Module');
        $this->moduleTemplate->setFlashMessageQueue($this->getFlashMessageQueue());
        $this->moduleTemplate->setModuleId('ucBackendModule');
    }
    public function showSettingsAction() : ResponseInterface {
        $backendUser = $this->getBackendUser();
        $contributors = $backendUser->uc['tx_passionweb_contributors'];
        $member = $backendUser->uc['tx_passionweb_check'];
        $this->moduleTemplate->assign('contributors', $contributors);
        $this->moduleTemplate->assign('member', $member);
        return $this->htmlResponse($this->moduleTemplate->render());
    }

    private function getBackendUser() {
        return $GLOBALS['BE_USER'];
    }
}
