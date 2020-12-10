<?php

/**
 * coreView
 * @author Aries V. Macandili <macandili.aries@gmail.com>
 * @since 2020.12.05
 */
class coreView
{
    /**
     * @param string $sViewFile
     * The file name of the template.
     */
    protected $sViewFile;

    /**
     * @param array $aViewData
     * The data to be passed on the template.
     */
    protected $aViewData;

    /**
     * __construct
     * @param string $sViewFile
     * @param array  $aViewData
     */
    public function __construct($sViewFile, $aViewData)
    {
        $aViewFile = explode('/', $sViewFile);
        $this->sTplDir = current($aViewFile);
        $this->sViewFile = VIEW . $sViewFile . '.phtml';
        $this->aViewData = $aViewData;
        $this->aViewData['sPageName'] = end($aViewFile);
        $this->render();
    }

    /**
     * render
     * Includes the template files.
     */
    private function render()
    {
        if (file_exists($this->sViewFile) === true) {
            extract($this->aViewData);
            include_once $this->sTplDir . '/template/header.phtml';
            include_once $this->sViewFile;
            include_once $this->sTplDir . '/template/footer.phtml';
        }
    }
}
