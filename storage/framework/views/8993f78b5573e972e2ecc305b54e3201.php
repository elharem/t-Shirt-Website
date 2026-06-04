<?php $__env->startSection('title', 'SEO & Référencement'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-3xl font-display">SEO & Référencement</h1>
        <p class="text-ink/50 text-sm mt-1">Optimise ta visibilité sur Google et les réseaux sociaux</p>
    </div>
    <div class="flex items-center gap-3">
        <?php
            $score = 0;
            if (!empty($seo['site_title'])) $score += 20;
            if (!empty($seo['site_description'])) $score += 20;
            if (!empty($seo['site_keywords'])) $score += 15;
            if (!empty($seo['og_image'])) $score += 20;
            if (!empty($seo['google_analytics'])) $score += 25;
        ?>
        <div class="text-center bg-white border border-ink/10 rounded-xl px-5 py-3 shadow-sm">
            <div class="text-2xl font-bold <?php echo e($score >= 80 ? 'text-green-500' : ($score >= 50 ? 'text-yellow-500' : 'text-red-500')); ?>"><?php echo e($score); ?>/100</div>
            <div class="text-xs text-ink/50 uppercase tracking-wider">Score SEO</div>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
        <span>✓</span> <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl border border-ink/10 p-4 shadow-sm">
        <div class="text-xs text-ink/50 uppercase tracking-wider mb-1">Titre</div>
        <div class="text-xl font-bold <?php echo e(!empty($seo['site_title']) ? 'text-green-500' : 'text-red-400'); ?>">
            <?php echo e(!empty($seo['site_title']) ? strlen($seo['site_title']).' car.' : 'Manquant'); ?>

        </div>
        <div class="text-xs text-ink/40 mt-1">Idéal : 50-60</div>
    </div>
    <div class="bg-white rounded-xl border border-ink/10 p-4 shadow-sm">
        <div class="text-xs text-ink/50 uppercase tracking-wider mb-1">Description</div>
        <div class="text-xl font-bold <?php echo e(!empty($seo['site_description']) ? 'text-green-500' : 'text-red-400'); ?>">
            <?php echo e(!empty($seo['site_description']) ? strlen($seo['site_description']).' car.' : 'Manquant'); ?>

        </div>
        <div class="text-xs text-ink/40 mt-1">Idéal : 120-155</div>
    </div>
    <div class="bg-white rounded-xl border border-ink/10 p-4 shadow-sm">
        <div class="text-xs text-ink/50 uppercase tracking-wider mb-1">Mots-clés</div>
        <div class="text-xl font-bold <?php echo e(!empty($seo['site_keywords']) ? 'text-green-500' : 'text-yellow-500'); ?>">
            <?php echo e(!empty($seo['site_keywords']) ? count(explode(',', $seo['site_keywords'])).' mots' : 'Vide'); ?>

        </div>
        <div class="text-xs text-ink/40 mt-1">Recommandé : 5-10</div>
    </div>
    <div class="bg-white rounded-xl border border-ink/10 p-4 shadow-sm">
        <div class="text-xs text-ink/50 uppercase tracking-wider mb-1">Analytics</div>
        <div class="text-xl font-bold <?php echo e(!empty($seo['google_analytics']) ? 'text-green-500' : 'text-red-400'); ?>">
            <?php echo e(!empty($seo['google_analytics']) ? 'Actif' : 'Inactif'); ?>

        </div>
        <div class="text-xs text-ink/40 mt-1">Google Analytics 4</div>
    </div>
</div>


<div class="grid lg:grid-cols-5 gap-6">

    
    <div class="lg:col-span-3 space-y-5">

        <form action="<?php echo e(route('admin.seo.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-ink/5 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-white text-xs font-bold">G</div>
                    <div>
                        <h2 class="font-semibold text-sm">Référencement Google</h2>
                        <p class="text-xs text-ink/40">Balises meta pour le moteur de recherche</p>
                    </div>
                </div>
                <div class="p-6 space-y-5">

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="text-xs font-semibold uppercase tracking-wider text-ink/70">Titre du site <span class="text-red-500">*</span></label>
                            <span class="text-xs font-mono px-2 py-0.5 rounded-full <?php echo e(strlen($seo['site_title']) > 60 ? 'bg-red-100 text-red-600' : (strlen($seo['site_title']) > 50 ? 'bg-yellow-100 text-yellow-600' : 'bg-green-100 text-green-600')); ?>" id="title-badge">
                                <?php echo e(strlen($seo['site_title'])); ?>/70
                            </span>
                        </div>
                        <input type="text" name="site_title"
                               value="<?php echo e(old('site_title', $seo['site_title'])); ?>"
                               class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                               maxlength="70"
                               oninput="
                                   var l = this.value.length;
                                   var b = document.getElementById('title-badge');
                                   b.textContent = l+'/70';
                                   b.className = 'text-xs font-mono px-2 py-0.5 rounded-full ' + (l>60?'bg-red-100 text-red-600':l>50?'bg-yellow-100 text-yellow-600':'bg-green-100 text-green-600');
                                   document.getElementById('preview-title').textContent = this.value || 'Titre du site';
                               "
                               required>
                        <p class="text-xs text-ink/40 mt-1">Apparaît dans l'onglet du navigateur et les résultats Google.</p>
                        <?php $__errorArgs = ['site_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="text-xs font-semibold uppercase tracking-wider text-ink/70">Meta description <span class="text-red-500">*</span></label>
                            <span class="text-xs font-mono px-2 py-0.5 rounded-full <?php echo e(strlen($seo['site_description']) > 155 ? 'bg-red-100 text-red-600' : (strlen($seo['site_description']) > 120 ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600')); ?>" id="desc-badge">
                                <?php echo e(strlen($seo['site_description'])); ?>/160
                            </span>
                        </div>
                        <textarea name="site_description" rows="3"
                                  class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition resize-none"
                                  maxlength="160"
                                  oninput="
                                      var l = this.value.length;
                                      var b = document.getElementById('desc-badge');
                                      b.textContent = l+'/160';
                                      b.className = 'text-xs font-mono px-2 py-0.5 rounded-full ' + (l>155?'bg-red-100 text-red-600':l>120?'bg-green-100 text-green-600':'bg-yellow-100 text-yellow-600');
                                      document.getElementById('preview-desc').textContent = this.value || 'Description du site';
                                  "
                                  required><?php echo e(old('site_description', $seo['site_description'])); ?></textarea>
                        <p class="text-xs text-ink/40 mt-1">Texte affiché sous le titre dans les résultats Google.</p>
                        <?php $__errorArgs = ['site_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-ink/70 mb-1.5">Mots-clés</label>
                        <input type="text" name="site_keywords"
                               value="<?php echo e(old('site_keywords', $seo['site_keywords'])); ?>"
                               class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                               placeholder="t-shirt, mode, belgique, coton bio, livraison rapide">
                        <p class="text-xs text-ink/40 mt-1">Séparés par des virgules. Utile pour Bing et la structure interne.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-ink/70 mb-1.5">Google Analytics ID</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-ink/30 text-sm">G-</span>
                            <input type="text" name="google_analytics"
                                   value="<?php echo e(old('google_analytics', $seo['google_analytics'])); ?>"
                                   class="w-full border border-ink/15 rounded-lg pl-8 pr-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                                   placeholder="XXXXXXXXXX">
                        </div>
                        <p class="text-xs text-ink/40 mt-1">Identifiant Google Analytics 4 pour le suivi des visites.</p>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-ink/5 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-orange-500 flex items-center justify-center text-white text-xs font-bold">OG</div>
                    <div>
                        <h2 class="font-semibold text-sm">Réseaux sociaux (Open Graph)</h2>
                        <p class="text-xs text-ink/40">Contrôle l'apparence lors du partage</p>
                    </div>
                </div>
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-ink/70 mb-1.5">Image de partage (URL)</label>
                        <input type="text" name="og_image"
                               value="<?php echo e(old('og_image', $seo['og_image'])); ?>"
                               class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                               placeholder="https://ton-site.com/image.jpg">
                        <p class="text-xs text-ink/40 mt-1">Affichée sur Facebook, LinkedIn, WhatsApp. Taille : 1200×630px.</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-ink/70 mb-1.5">Compte Twitter/X</label>
                        <input type="text" name="twitter_handle"
                               value="<?php echo e(old('twitter_handle', $seo['twitter_handle'] ?? '')); ?>"
                               class="w-full border border-ink/15 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-accent transition"
                               placeholder="@toncompte">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-accent text-white font-semibold py-3.5 rounded-xl hover:bg-accent/90 transition flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Enregistrer les paramètres SEO
            </button>
        </form>
    </div>

    
    <div class="lg:col-span-2 space-y-5">

        
        <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-ink/5">
                <h2 class="font-semibold text-sm">Aperçu Google</h2>
                <p class="text-xs text-ink/40">Se met à jour en temps réel</p>
            </div>
            <div class="p-5">
                <div class="bg-gray-50 rounded-lg p-4 font-sans">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-5 h-5 rounded-full bg-accent flex items-center justify-center text-white text-xs font-bold">T</div>
                        <div>
                            <p class="text-xs font-medium text-gray-700 leading-none">TEE/SHOP</p>
                            <p class="text-xs text-gray-400"><?php echo e(url('/')); ?></p>
                        </div>
                    </div>
                    <p class="text-blue-600 text-sm font-medium hover:underline cursor-pointer" id="preview-title"><?php echo e($seo['site_title'] ?: 'Titre du site'); ?></p>
                    <p class="text-xs text-gray-500 mt-0.5 leading-relaxed" id="preview-desc"><?php echo e($seo['site_description'] ?: 'Description du site'); ?></p>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-ink/5">
                <h2 class="font-semibold text-sm">Score SEO détaillé</h2>
            </div>
            <div class="p-5">
                <div class="flex items-center gap-4 mb-4">
                    <div class="relative w-16 h-16">
                        <svg class="w-16 h-16 -rotate-90" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="15.9" fill="none" stroke="#f0ede8" stroke-width="3"/>
                            <circle cx="18" cy="18" r="15.9" fill="none"
                                stroke="<?php echo e($score >= 80 ? '#22c55e' : ($score >= 50 ? '#f59e0b' : '#ef4444')); ?>"
                                stroke-width="3"
                                stroke-dasharray="<?php echo e($score); ?> <?php echo e(100 - $score); ?>"
                                stroke-linecap="round"/>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-sm font-bold"><?php echo e($score); ?></span>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold <?php echo e($score >= 80 ? 'text-green-600' : ($score >= 50 ? 'text-yellow-600' : 'text-red-500')); ?>">
                            <?php echo e($score >= 80 ? 'Excellent' : ($score >= 50 ? 'À améliorer' : 'Insuffisant')); ?>

                        </p>
                        <p class="text-xs text-ink/50">Score sur 100 points</p>
                    </div>
                </div>
                <ul class="space-y-2">
                    <?php
                        $items = [
                            ['label' => 'Titre configuré', 'done' => !empty($seo['site_title']), 'pts' => 20],
                            ['label' => 'Description configurée', 'done' => !empty($seo['site_description']), 'pts' => 20],
                            ['label' => 'Mots-clés définis', 'done' => !empty($seo['site_keywords']), 'pts' => 15],
                            ['label' => 'Image Open Graph', 'done' => !empty($seo['og_image']), 'pts' => 20],
                            ['label' => 'Google Analytics', 'done' => !empty($seo['google_analytics']), 'pts' => 25],
                        ];
                    ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2">
                                <span class="<?php echo e($item['done'] ? 'text-green-500' : 'text-gray-300'); ?>"><?php echo e($item['done'] ? '✓' : '○'); ?></span>
                                <span class="<?php echo e($item['done'] ? 'text-ink/70' : 'text-ink/40'); ?>"><?php echo e($item['label']); ?></span>
                            </div>
                            <span class="<?php echo e($item['done'] ? 'text-green-600 font-semibold' : 'text-ink/30'); ?>">+<?php echo e($item['pts']); ?>pts</span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

        
        <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-ink/5">
                <h2 class="font-semibold text-sm">Partager le site</h2>
            </div>
            <div class="p-5">
                <div class="bg-gray-50 rounded-lg px-3 py-2 mb-3 font-mono text-xs text-ink/60 break-all"><?php echo e($shareUrl); ?></div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($shareUrl)); ?>" target="_blank" class="flex items-center justify-center gap-1.5 border border-ink/15 rounded-lg py-2 text-xs hover:bg-blue-50 hover:border-blue-300 transition">📘 Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($shareUrl)); ?>" target="_blank" class="flex items-center justify-center gap-1.5 border border-ink/15 rounded-lg py-2 text-xs hover:bg-gray-50 transition">𝕏 Twitter</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(urlencode($shareUrl)); ?>" target="_blank" class="flex items-center justify-center gap-1.5 border border-ink/15 rounded-lg py-2 text-xs hover:bg-blue-50 hover:border-blue-300 transition">💼 LinkedIn</a>
                    <a href="https://wa.me/?text=<?php echo e(urlencode('Découvre TEE/SHOP : ' . $shareUrl)); ?>" target="_blank" class="flex items-center justify-center gap-1.5 border border-ink/15 rounded-lg py-2 text-xs hover:bg-green-50 hover:border-green-300 transition">💬 WhatsApp</a>
                </div>
            </div>
        </div>

        
<div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-ink/5 flex items-center justify-between">
        <div>
            <h2 class="font-semibold text-sm">SEO des produits</h2>
            <p class="text-xs text-ink/40">État du référencement par produit</p>
        </div>
        <span class="text-xs bg-gray-100 text-ink/50 px-3 py-1 rounded-full"><?php echo e($products->count()); ?> produits</span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-ink/5">
                <tr>
                    <th class="text-left px-6 py-3 text-xs uppercase tracking-wider text-ink/50">Produit</th>
                    <th class="text-left px-6 py-3 text-xs uppercase tracking-wider text-ink/50">Meta titre</th>
                    <th class="text-left px-6 py-3 text-xs uppercase tracking-wider text-ink/50">Meta description</th>
                    <th class="text-left px-6 py-3 text-xs uppercase tracking-wider text-ink/50">Mots-clés</th>
                    <th class="text-left px-6 py-3 text-xs uppercase tracking-wider text-ink/50">Score</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/5">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pscore = 0;
                        if (!empty($product->meta_title)) $pscore += 40;
                        if (!empty($product->meta_description)) $pscore += 40;
                        if (!empty($product->meta_keywords)) $pscore += 20;
                    ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">
                            <div class="font-medium text-xs"><?php echo e($product->name); ?></div>
                            <div class="text-xs text-ink/40">/products/<?php echo e($product->slug); ?></div>
                        </td>
                        <td class="px-6 py-3">
                            <?php if($product->meta_title): ?>
                                <span class="text-xs text-green-600">✓ <?php echo e(strlen($product->meta_title)); ?> car.</span>
                            <?php else: ?>
                                <span class="text-xs text-yellow-500">○ Auto</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-3">
                            <?php if($product->meta_description): ?>
                                <span class="text-xs text-green-600">✓ <?php echo e(strlen($product->meta_description)); ?> car.</span>
                            <?php else: ?>
                                <span class="text-xs text-yellow-500">○ Auto</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-3">
                            <?php if($product->meta_keywords): ?>
                                <span class="text-xs text-green-600">✓</span>
                            <?php else: ?>
                                <span class="text-xs text-gray-300">○</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <div class="w-16 bg-gray-100 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full <?php echo e($pscore >= 80 ? 'bg-green-500' : ($pscore >= 40 ? 'bg-yellow-500' : 'bg-red-400')); ?>"
                                         style="width: <?php echo e($pscore); ?>%"></div>
                                </div>
                                <span class="text-xs font-mono <?php echo e($pscore >= 80 ? 'text-green-600' : ($pscore >= 40 ? 'text-yellow-600' : 'text-red-500')); ?>"><?php echo e($pscore); ?>%</span>
                            </div>
                        </td>
                        <td class="px-6 py-3">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                               class="text-xs text-accent hover:underline">Optimiser →</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

        
        <div class="bg-white rounded-xl border border-ink/10 shadow-sm overflow-hidden">
            <div class="px-5 py-4 border-b border-ink/5 flex items-center justify-between">
                <h2 class="font-semibold text-sm">URLs produits</h2>
                <span class="text-xs text-ink/40"><?php echo e($products->count()); ?> produits</span>
            </div>
            <div class="divide-y divide-ink/5 max-h-48 overflow-y-auto">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between px-5 py-2.5">
                        <code class="text-xs text-ink/60">/products/<?php echo e($product->slug); ?></code>
                        <a href="<?php echo e(route('products.show', $product)); ?>" target="_blank" class="text-accent text-xs hover:underline">↗</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/admin/seo.blade.php ENDPATH**/ ?>