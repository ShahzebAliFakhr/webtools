<?php 
$pagetitle = "IFRAME GENERATOR";
?>

    <?php include('components/header.php')?>

    <div class="container-fluid iframe_tools" id="webtools">
        <div class="row no-margins">
            <div class="col-lg-8">
                <div class="form">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_name">Name</label>
                                <input id="i_name" class="form-control" placeholder="myiFrame" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="i_width">Width</label>
                                <input type="number" id="i_width" class="form-control"placeholder="300" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="i_height">Height</label>
                                <input type="number" id="i_height" class="form-control" placeholder="100"/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="i_dimensions">Dimensions</label>
                                <select id="i_dimensions" class="form-control">
                                    <option value="px">px</option>
                                    <option value="%">%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_scrollbar">Scrollbar</label>
                                <select id="i_scrollbar" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_marginWidth">marginWidth</label>
                                <input type="number" id="i_marginWidth" class="form-control" placeholder="0"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_marginHeight">marginHeight</label>
                                <input type="number" id="i_marginHeight" class="form-control" placeholder="0"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_border">Border</label>
                                <select id="i_border" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_borderType">borderType</label>
                                <select id="i_borderType" class="form-control">
                                    <option value="none">None</option>
                                    <option value="solid">Solid</option>
                                    <option value="dotted">Dotted</option>
                                    <option value="dashed">Dashed</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="i_borderSize">borderSize</label>
                                <select id="i_borderSize" class="form-control">
                                    <option value="0px">0px</option>
                                    <option value="1px">1px</option>
                                    <option value="2px">2px</option>
                                    <option value="3px">3px</option>
                                    <option value="4px">4px</option>
                                    <option value="5px">5px</option>
                                    <option value="6px">6px</option>
                                    <option value="7px">7px</option>
                                    <option value="8px">8px</option>
                                    <option value="9px">9px</option>
                                    <option value="10px">10px</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="i_borderColor">borderColor</label>
                                    <input type="text" id="i_borderColor" class="form-control" placeholder="#ffffff" value="#ffffff"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="i_iframeURL">iFrame URL <small id="iframe_error" class="text-danger">* </small></label>
                                    <input type="text" id="i_iframeURL" value="https://" placeholder="https://example.com" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <div class="form-group">
                                <!-- <button type="button" class="btn btn-success mb-1"><i class="fa fa-eye"></i> PREVIEW</button> -->
                                <button type="button" class="btn btn-success mb-1" onclick="generate_iframe_code()"><i class="fa fa-code"></i> GENERATE</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="iframeGeneratedCode">iFrame Generated Code</label>
                                <textarea id="iframeGeneratedCode" rows="4" readonly class="form-control"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-default mb-1 copytoclipboard"  data-clipboard-target="#iframeGeneratedCode">Copy to Clipboard</button>
                                <button type="button" class="btn btn-default mb-1" onclick="select_all_iframeGenerateCode()">Select All</button>
                                <button type="button" class="btn btn-default mb-1" onclick="reset_all_iframeGenerateCode()">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <a href="#" class="btn btn-default mb-1">LINK 1</a>
                    <a href="#" class="btn btn-default mb-1">LINK 2</a>
                    <a href="#" class="btn btn-default mb-1">LINK 3</a>
                    <a href="#" class="btn btn-default mb-1">LINK 4</a>
                    <a href="#" class="btn btn-default mb-1">LINK 5</a>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
                <div class="card mb-3">
                    <?php include('ads/square-ad.php');?>
                </div>
            </div>
        </div>
    </div>

    <?php include('content/iframe.php')?>
    <?php include('components/footer.php')?>